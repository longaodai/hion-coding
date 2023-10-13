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
            $description = !empty($data->post_sub_description) ? $data->post_sub_description : $data->post_description;

            if (!empty($data->post_title)) OpenGraph::set('title', $data->post_title);
            if (!empty($data->post_description)) OpenGraph::set('description', strip_tags(Str::limit($description, 200, '...')));
            if (!empty($data->post_image)) OpenGraph::set('image', asset(getPathImage($data->post_image)));
        } else {
            OpenGraph::set('description', strip_tags(Str::limit($data->get('page_description'), 200, '...')));
            OpenGraph::set('title', $data->get('page_title'));
        }
    }
}
