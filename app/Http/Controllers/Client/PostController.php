<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Posts\PostServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public $postService;

    /**
     * @param PostServiceInterface $postService
     */
    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Get list post
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
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
        setDataMeta(
            collect([
                'page_title' => 'Posts - Hion Coding Blogs',
                'page_description' => 'Posts - Hion Coding Blogs share everything',
            ]),
            collect([
                'is_post' => false
            ]),
        );

        return view('client.pages.posts', compact('dataPost'));
    }

    /**
     * Show detail post
     *
     * @param $slug
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function show($slug)
    {
        try {
            $post = $this->postService->getFirstBy(
                collect([
                    'post_slug' => $slug,
                    'with_users' => true,
                    'with_category' => true,
                ])
            );

            if (empty($post)) {
                return abort(404);
            }

            $postRelation = $this->postService->all(
                collect([
                    'is_active' => true,
                    'limit' => 2,
                    'category_id' => $post->category_id,
                    'not_post_id' => $post->id,
                ])
            );
            setDataMeta($post, collect(['is_post' => true]));

            return view('client.pages.post', compact('post', 'postRelation'));
        } catch (\Exception $exeption) {
            Log::debug('---------- SHOW POST CLIENT ERROR ----------');
            Log::debug($exeption->getMessage());
            Log::debug('---------- END SHOW POST CLIENT ERROR ----------');

            return abort(404);
        }
    }

    private function addViewPost($slug, $views = 0)
    {
        if (empty($slug)) {
            return;
        }

        try {
            $this->postService->update(
                collect([
                    'post_views' => $views + 1,
                ]),
                collect([
                    'post_slug' => $slug,
                ])
            );
        } catch (\Exception $exeption) {
            Log::debug('---------- ADD VIEW POST CLIENT ERROR ----------');
            Log::debug($exeption->getMessage());
            Log::debug('---------- END ADD VIEW POST CLIENT ERROR ----------');
        }
    }
}
