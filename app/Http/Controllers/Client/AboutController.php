<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        setDataMeta(
            collect([
                'page_title' => 'About - Hion Coding Blogs',
                'page_description' => 'About - Hion Coding Blogs share everything',
            ]),
            collect([
                'is_post' => false
            ]),
        );

        return view('client.pages.about');
    }
}
