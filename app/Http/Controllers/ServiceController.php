<?php

namespace App\Http\Controllers;

use App\Models\Service\Post;
use App\Models\Page;
use App\Settings\ThemeSettings;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{


    public function show(Post $post)
    {
        return view('service.show', [
            'record' => $post,
        ]);
    }
}
