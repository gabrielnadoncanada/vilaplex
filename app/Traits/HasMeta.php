<?php

namespace App\Traits;

use App\Models\Meta;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasMeta
{
    protected static function bootHasMeta()
    {
        static::created(function ($model) {
            if (! $model->meta) {
                $model->meta()->create([
                    'title' => $model->title,
                    'description' => $model->description,
                    'image' => $model->image,
                ]);
            }
        });
        static::deleted(function ($model) {
            $model->meta()->delete();
        });
    }

    public function meta(): MorphOne
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
