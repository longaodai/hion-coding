<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryServiceInterface;
use App\Services\Posts\PostServiceInterface;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    private $categoryService;
    private $postService;
    private $pages = [
        [
            'url' => '/',
            'priority' => '1.00'
        ],
        [
            'url' => '/about',
            'priority' => '0.80'
        ],
        [
            'url' => '/posts',
            'priority' => '0.80'
        ],
        [
            'url' => '/contact',
            'priority' => '0.80'
        ],
        [
            'url' => '/vo-dai-toi-thuong-cau-hoi-quy-lao',
            'priority' => '0.80'
        ],
        [
            'url' => '/convert-image',
            'priority' => '0.80'
        ],
    ];

    public function __construct(CategoryServiceInterface $categoryService, PostServiceInterface $postService)
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->all(
            collect([
                'is_active' => true,
            ])
        );
        $resultCreateSiteMap = $this->renewGenerateSiteMap($posts);

        if ($resultCreateSiteMap) {
            return redirect(route('admin.dashboard'))->with('success', __('sitemap.msg_optimize_success'));
        }

        return redirect(route('admin.dashboard'))->with('error', __('sitemap.msg_optimize_error'));
    }

    protected function generateSitemap($categories)
    {
        $sitemapContent = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemapContent .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($categories as $category) {
            $fileNameCategory = 'sitemaps/sitemap-' . $category->slug . '.xml';
            $resultCreatePostXml = $this->generateCategorySitemap($category->posts, $fileNameCategory);

            if (!$resultCreatePostXml) {
                continue;
            }

            $sitemapUrl = url('/' . $fileNameCategory);
            $sitemapContent .= '<sitemap>' . PHP_EOL;
            $sitemapContent .= '<loc>' . $sitemapUrl . '</loc>' . PHP_EOL;
            $sitemapContent .= '</sitemap>' . PHP_EOL;
        }

        $sitemapContent .= '</sitemapindex>';
        file_put_contents(public_path('sitemap.xml'), $sitemapContent);
        file_put_contents(public_path('sitemaps.xml'), $sitemapContent);

        return true;
    }

    protected function generateCategorySitemap($posts, $fileName)
    {
        $sitemapContent = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemapContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        if (empty($posts)) {
            return false;
        }

        foreach ($posts as $post) {
            $url = url('/post/' . $post->post_slug);
            $sitemapContent .= '<url>' . PHP_EOL;
            $sitemapContent .= '<loc>' . $url . '</loc>' . PHP_EOL;
            $sitemapContent .= '</url>' . PHP_EOL;
        }

        $sitemapContent .= '</urlset>';

        if (!file_exists(public_path('sitemaps'))) {
            mkdir(public_path('sitemaps'), 0777, true);
        }

        file_put_contents(public_path($fileName), $sitemapContent);

        return true;
    }

    private function renewGenerateSiteMap($posts)
    {

        $sitemapContent = '<?xml version="1.0" encoding="UTF-8"?>
                            <urlset
                                xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                                xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                                        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
        $lastmod = date('Y-m-d');

        foreach ($this->pages as $page) {
            $url = url($page['url']);
            $sitemapContent .= '<url>' . PHP_EOL;
            $sitemapContent .= '<loc>' . $url . '</loc>' . PHP_EOL;
            $sitemapContent .= '<lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
            $sitemapContent .= '<priority>' . $page['priority'] . '</priority>' . PHP_EOL;
            $sitemapContent .= '</url>' . PHP_EOL;
        }

        foreach ($posts as $post) {
            if (empty($post->post_slug)) {
                continue;
            }

            $sitemapUrl = url('/post/' . $post->post_slug);
            $sitemapContent .= '<url>' . PHP_EOL;
            $sitemapContent .= '<loc>' . $sitemapUrl . '</loc>' . PHP_EOL;
            $sitemapContent .= '<lastmod>' . date('Y-m-d', strtotime($post->updated_at)) . '</lastmod>' . PHP_EOL;
            $sitemapContent .= '<priority>0.80</priority>' . PHP_EOL;
            $sitemapContent .= '</url>' . PHP_EOL;
        }

        $sitemapContent .= '</urlset>';
        file_put_contents(public_path('sitemap.xml'), $sitemapContent);
        file_put_contents(public_path('sitemaps.xml'), $sitemapContent);

        return true;
    }
}
