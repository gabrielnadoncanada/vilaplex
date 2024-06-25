<?php

namespace App\Http\Controllers;

use App\Models\Service\Post;

class ServiceController extends Controller
{
    public function show(Post $post)
    {
        return view('templates.single', [
            'record' => $post,
        ]);
    }
}
