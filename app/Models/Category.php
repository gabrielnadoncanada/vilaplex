<?php

namespace App\Models;

use App\Concerns\HandlesStorageFields;
use App\Models\Shop\Customer;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasSEO;
    use HasTranslations;
    use HandlesStorageFields;

    public array $translatable = ['title', 'slug'];

    protected array $storage_fields = [
        'featured_image',
    ];

    protected $guarded = [];

    protected $casts = [
        'featured_image' => 'array',
        'title' => 'array',
        'slug' => 'array',
    ];


    public function services(): MorphToMany
    {
        return $this->morphedByMany(Service::class, 'categorizable');
    }

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'categorizable');
    }
}
