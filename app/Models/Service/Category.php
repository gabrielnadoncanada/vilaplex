<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'service_categories';

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'service_category_post');
    }
}
