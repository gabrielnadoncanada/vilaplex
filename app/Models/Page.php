<?php

namespace App\Models;

use App\Enums\DisplayStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasSEO;

    public $translatable = ['title', 'slug', 'content', 'excerpt'];

    protected $guarded = [];

    protected $casts = [
        'status' => DisplayStatus::class,
        'featured_image' => 'array',
    ];


    public function getRouteKeyName(): string
    {
        return filament()->isServing() ? 'id' : 'slug->' . app()->getLocale();
    }

    public function scopePublished($query)
    {
        return $query->where('status', '!=', \App\Enums\DisplayStatus::DRAFT);
    }
}
