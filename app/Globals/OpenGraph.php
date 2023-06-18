<?php

namespace App\Globals;

class OpenGraph
{
    /**
     * Initial value meta
     *
     * @var array
     */
    protected static $values = [
        'title' => 'OHION - Blogs share everything',
        'description' => 'Blogs share everything',
        'image' => './common/images/logo.png',
    ];

    public function __construct()
    {
        static::$values['image'] = asset('common/images/logo.png');
        static::$values['title'] = __('meta.lbl_title');
        static::$values['description'] = __('meta.lbl_description');
    }

    public static function get($key)
    {
        return static::$values[$key] ?? null;
    }

    public static function set($key, $value)
    {
        static::$values[$key] = $value;
    }
}
