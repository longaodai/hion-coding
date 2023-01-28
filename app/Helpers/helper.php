<?php

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
        if (!empty($image) && file_exists(public_path('storage/'. $image))) {
            return 'storage/'. $image;
        }

        return 'libs/no-image.png';;
    }
}