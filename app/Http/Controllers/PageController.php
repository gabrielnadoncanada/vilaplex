<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Settings\ThemeSettings;

class PageController extends Controller
{
    public function show($slug = null)
    {
        $record = Page::find(app(ThemeSettings::class)->site_home_page_id);

        if ($slug) {
            $page = Page::where('slug', $slug)->published()->first();

            if ($page) {
                $record = $page;
            }
        }

        return view('templates.single', [
            'record' => $record,
        ]);
    }
}
