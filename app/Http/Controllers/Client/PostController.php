<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Posts\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }


    public function index()
    {
        $dataPost = $this->postService->getList(
            collect([
                'is_active' => true,
                'with_users' => true,
                'with_category' => true,
            ]),
            collect([
                'set_pagination' => 20,
            ])
        );

        return view('client.pages.posts', compact('dataPost'));
    }

    public function show($slug)
    {
        $post = $this->postService->getFirstBy(
            collect([
                'post_slug' => $slug,
                'with_users' => true,
                'with_category' => true,
            ])
        );

        $postRelation = $this->postService->all(
            collect([
                'is_active' => true,
                'limit' => 2,
                'category_id' => $post->category_id,
                'not_post_id' => $post->id,
            ])
        );

        return view('client.pages.post', compact('post', 'postRelation'));
    }
}
