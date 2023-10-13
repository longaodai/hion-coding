<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        setDataMeta(
            collect([
                'page_title' => 'Contact - Hion Coding Blogs',
                'page_description' => 'Contact - Hion Coding Blogs share everything',
            ]),
            collect([
                'is_post' => false
            ]),
        );

        return view('client.pages.contact');
    }
}
