<?php

namespace App\Models;

use App\Enums\DisplayStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'slug', 'content', 'excerpt'];

    protected array $storage_fields = [
        'featured_image',
    ];

    protected $guarded = [];

    protected $casts = [
        'featured_image' => 'array',
    ];

    public function getRouteKeyName(): string
    {
        return filament()->isServing() ? 'id' : 'slug->' . app()->getLocale();
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categorizables');
    }

    public function scopePublished($query)
    {
        return $query->where('status', '!=', \App\Enums\DisplayStatus::DRAFT);
    }
}
