<?php

namespace App\Models\Service;

use App\Traits\HasMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    use HasMeta;

    protected $table = 'service_posts';

    protected $guarded = [];

    protected $casts = [
        'is_visible' => 'boolean',
        'published_at' => 'datetime',
        'content' => 'array',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'service_category_post', 'service_post_id', 'service_category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_visible', '!=', false)
            ->where('published_at', '<=', now());
    }

    public function getBasePath(): string
    {
        return '/services/';
    }

    public function getPublicUrl()
    {
        return url()->to($this->getBasePath() . $this->slug . '/');
    }
}
