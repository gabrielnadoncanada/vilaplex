<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;

class BlogController extends Controller
{
    public function show(Post $post)
    {
        return view('templates.single', [
            'record' => $post,
        ]);
    }
}
