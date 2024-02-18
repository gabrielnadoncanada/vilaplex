<?php

namespace App\Models;

use App\Concerns\HandlesStorageFields;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasSEO;
    use HasTranslatableSlug;
    use HasTranslations;
    use HandlesStorageFields;

    public array $translatable = ['title', 'slug'];

    protected array $storage_fields = [
        'featured_image',
    ];

    protected $guarded = [];

    protected $casts = [
        'featured_image' => 'array',
    ];

    public function celebrities(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'category_service', 'category_id', 'service_id');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return filament()->isServing() ? 'id' : 'slug';
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: $this->excerpt,
            image: $this->featured_image,
        );
    }

    protected function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => __('app.category.excerpt', ['title' => $this->title])
        );
    }
}
