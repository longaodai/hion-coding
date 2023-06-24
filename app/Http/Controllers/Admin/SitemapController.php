<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryServiceInterface;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->all(
            collect([
                'with_posts' => true
            ])
        );
        $resultCreateSiteMap = $this->generateSitemap($categories);

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
}
