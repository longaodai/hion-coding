<?php

use App\Facades\OpenGraph;
use Illuminate\Support\Str;

if (!function_exists('formatDate')) {
    function formatDate($date, string $format = 'Y/m/d')
    {
        if ($date instanceof \Carbon\Carbon) {
            return $date->format($format);
        }

        return $date;
    }
}

if (!function_exists('getPathImage')) {
    function getPathImage($image)
    {
        if (!empty($image) && file_exists(public_path($image))) {
            return $image;
        }

        return 'libs/no-image.png';;
    }
}

if (!function_exists('setDataMeta')) {
    function setDataMeta($data, $options)
    {
        if (!empty($options->get('is_post'))) {
            if (!empty($data->post_title)) OpenGraph::set('title', $data->post_title);
            if (!empty($data->post_description)) OpenGraph::set('description', strip_tags(Str::limit($data->post_description, 100, '...')));
            if (!empty($data->post_image)) OpenGraph::set('image', getPathImage($data->post_image));
        }
    }
}
