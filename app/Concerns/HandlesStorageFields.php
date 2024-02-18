<?php

namespace App\Concerns;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Support\Facades\Storage;

/**
 * Trait HandlesStorageFields
 *
 * This trait provides methods for handling storage fields in a model.
 * It includes event listeners for deleting and updating events, as well as methods for retrieving, deleting, and
 * handling storage fields.
 */
trait HandlesStorageFields
{
    use HasEvents;

    /**
     * Sets up event listeners to handle storage field updates and deletions.
     */
    public static function bootHandlesStorageFields(): void
    {
        static::updating(function ($model) {
            $model->deleteUpdatedStorageFields();
        });
        static::deleting(function ($model) {
            $model->deleteAllStorageFields();
        });
    }

    /**
     * Retrieves the storage fields.
     *
     * This method returns an array of storage fields, which represent the fields used for storage.
     *
     * @return array The storage fields.
     */
    public function getStorageFields(): array
    {
        return $this->storage_fields ?? [];
    }

    /**
     * Deletes the storage fields that have been updated in the model.
     */
    private function deleteUpdatedStorageFields(): void
    {
        $dirtyFields = $this->getDirty();
        foreach ($this->getStorageFields() as $field) {
            if (array_key_exists($field, $dirtyFields)) {
                $this->deleteStorageField($field);
            }
        }
    }

    /**
     * Deletes all storage fields.
     *
     * This method iterates over the storage fields obtained from the
     * getStorageFields() method and deletes each field using the
     * deleteStorageField() method.
     */
    private function deleteAllStorageFields(): void
    {
        foreach ($this->getStorageFields() as $field) {
            $this->deleteStorageField($field);
        }
    }

    /**
     * Delete a storage field.
     *
     * @param  string  $field  The name of the storage field to delete.
     */
    private function deleteStorageField(string $field): void
    {
        $originalField = $this->getOriginal($field);
        $currentField = $this->{$field};
        if (is_array($originalField)) {
            foreach ($originalField as $item) {
                if (! in_array($item, $currentField, true)) {
                    $this->deleteFromDisk($item);
                }
            }
        } else {
            if ($originalField !== $currentField) {
                $this->deleteFromDisk($originalField);
            }
        }
    }

    /**
     * Deletes a file from disk.
     *
     * @param  string|null  $path  The path of the file to be deleted.
     */
    private function deleteFromDisk(?string $path): void
    {
        if ($path) {
            Storage::disk(config('filesystems.default'))->delete($path);
        }
    }
}
