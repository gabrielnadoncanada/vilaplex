<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'blog_categories';

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'blog_category_post');
    }
}
