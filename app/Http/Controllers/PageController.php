<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Settings\ThemeSettings;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::find(app(ThemeSettings::class)->site_home_page_id);

        return view('page.index', [
            'record' => $page,
        ]);
    }

    public function blogIndex()
    {
        $page = Page::find(app(ThemeSettings::class)->site_blog_page_id);

        return view('page.blog-index', [
            'record' => $page,
        ]);
    }

    public function serviceIndex()
    {
        $page = Page::find(app(ThemeSettings::class)->site_service_page_id);

        return view('page.service-index', [
            'record' => $page,
        ]);
    }

    public function show(Page $page)
    {
        return view('page.show', [
            'record' => $page,
        ]);
    }
}
