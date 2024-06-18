<?php

namespace App\Models\Blog;

use App\Enums\PublishedStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
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

    protected $table = 'blog_posts';

    protected function slug(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {

                if (filament()->isServing()) {
                    return $value;
                }

                return route('blog.show', $value);
            },
        );
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'blog_category_post', 'blog_post_id', 'blog_category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', '!=', PublishedStatus::DRAFT);
    }
}
