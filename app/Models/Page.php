<?php

namespace App\Models;

use App\Enums\PublishedStatus;
use App\Settings\ThemeSettings;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Page extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $guarded = [];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'status' => PublishedStatus::class,
        'content' => 'array',
    ];


    public function scopePublished($query)
    {
        return $query->where('status', '!=', PublishedStatus::DRAFT);
    }

    public function getRouteKeyName(): string
    {
        return filament()->isServing() ? 'id' : 'slug->' . app()->getLocale();
    }
}
