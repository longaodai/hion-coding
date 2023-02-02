<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Posts\PostServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $postService = app(PostServiceInterface::class);
        $listPost = $postService->all(collect([
            'limit' => 10,
            'is_active' => true,
        ]));

        return view('client.pages.home', compact('listPost'));
    }
}
