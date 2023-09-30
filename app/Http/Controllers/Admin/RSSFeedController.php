<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Posts\PostServiceInterface;
use Illuminate\Http\Request;

class RSSFeedController extends Controller
{
    private $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->all(
            collect([]),
            collect([
                'with_users',
                'with_category'
            ])
        );

        return response()->view('client.modules.rss.rss', compact('posts'))->header('Content-Type', 'text/xml');
    }
}
