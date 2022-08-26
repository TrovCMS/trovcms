<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        abort_unless($page = Page::where('front_page', true)->first(), 404);

        return view('welcome', [
            'page' => $page,
        ]);
    }

    public function show(Page $page)
    {
        abort_unless($page->status == 'Published' || auth()->user(), 404);

        return view('page', [
            'page' => $page,
        ]);
    }
}
