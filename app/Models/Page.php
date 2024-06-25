<?php

namespace App\Models;

use App\Enums\PublishedStatus;
use App\Filament\Templates\Archive;
use App\Filament\Templates\Home;
use App\Filament\Templates\Single;
use App\Settings\ThemeSettings;
use App\Traits\HasMeta;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    use HasMeta;

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
        return $query->where('is_visible', '!=', false)
            ->where('published_at', '<=', now());
    }

    public function getRouteKeyName(): string
    {
        return filament()->isServing() ? 'id' : 'slug->' . app()->getLocale();
    }

    public function getBasePath(): string
    {
        return '/';
    }

    public function getPublicUrl()
    {
        return url()->to($this->getBasePath() . $this->slug . '/');
    }

    public function template(): string
    {
        if (app(ThemeSettings::class)->site_home_page_id == $this->id) {
            return Home::class;
        }

        if (app(ThemeSettings::class)->site_blog_page_id == $this->id
            || app(ThemeSettings::class)->site_service_page_id == $this->id) {
            return Archive::class;
        }

        return Single::class;
    }
}
