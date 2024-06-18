<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\Page;
use App\Settings\ThemeSettings;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{


    public function show(Post $post)
    {
        return view('page.show', [
            'record' => $post,
        ]);
    }

}
