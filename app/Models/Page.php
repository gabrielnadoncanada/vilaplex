<?php

namespace App\Models;

use App\Enums\PageStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasTranslatableSlug;
    use HasSEO;

    public $translatable = ['title', 'slug', 'content'];

    protected $guarded = [
    ];

    protected $casts = [
        'status' => PageStatus::class,
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['title'])
            ->saveSlugsTo('slug');
    }
    public function getRouteKeyName(): string
    {
        return filament()->isServing() ? 'id' : 'slug';
    }


}
