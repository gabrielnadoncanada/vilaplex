<?php

namespace App\Models\Service;

use App\Enums\PublishedStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $table = 'service_posts';

    protected $guarded = [];

    protected $casts = [
        'status' => PublishedStatus::class,
        'content' => 'array',
    ];

    protected function slug(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {

                if (filament()->isServing()) {
                    return $value;
                }

                return route('service.show', $value);
            },
        );
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'service_category_post', 'service_post_id', 'service_category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', '!=', PublishedStatus::DRAFT);
    }
}
