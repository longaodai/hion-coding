<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class VDTTController extends Controller
{
    public function search()
    {
        setDataMeta(
            collect([
                'page_title' => 'Võ Đài Tối Thượng - Hion Coding Blogs',
                'page_description' => 'Võ Đài Tối Thượng - Hion Coding Blogs share everything',
            ]),
            collect([
                'is_post' => false
            ]),
        );

        return view('client.pages.vdtt');
    }
}
