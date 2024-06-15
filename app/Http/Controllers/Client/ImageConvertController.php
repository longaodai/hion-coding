<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageConvertController extends Controller
{
    /**
     * Page convert to image
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @author <vochilong>
     */
    public function index()
    {
        setDataMeta(
            collect([
                'page_title' => 'Convert Image - Hion Coding Blogs',
                'page_description' => 'Convert Image, Convert Image To Webp - Hion Coding Blogs share everything',
            ]),
            collect([
                'is_post' => false
            ]),
        );

        return view('client.pages.convert_image');
    }

    /**
     * Handle convert image to webp
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @author <vochilong>
     */
    public function convertToWebP(Request $request)
    {
        $images = $request->file('image');

        if (empty($images)) {
            return response()->json(['error' => 'Pls select images to convert!'], 400);
        }

        $convertedImages = [];

        try {
            foreach ($images as $image) {
                $nameFileUpload = $image->getClientOriginalName() . '.webp';
                $newImage = imagecreatefromstring(file_get_contents($image->path()));
                ob_start();
                imagewebp($newImage, null);
                $webpData = ob_get_clean();
                $webpDataUrl = 'data:image/webp;base64,' . base64_encode($webpData);
                $convertedImages[] = [
                    'name' => $nameFileUpload,
                    'path' => $webpDataUrl,
                ];
                imagedestroy($newImage);
            }

            return response()->json(['message' => 'Images converted to WebP successfully', 'images' => $convertedImages]);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Oop! Something went wrong!'], 500);
        }
    }
}
