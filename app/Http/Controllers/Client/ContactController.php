<?php

namespace App\Http\Controllers\Client;

use App\Events\SendMailInquiryEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\SendMailRequest;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        setDataMeta(
            collect([
                'page_title' => 'Contact - Hion Coding Blogs',
                'page_description' => 'Contact - Hion Coding Blogs share everything',
            ]),
            collect([
                'is_post' => false
            ]),
        );

        return view('client.pages.contact');
    }

    /**
     * Send mail inquiry
     *
     * @param Request $request
     * 
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function sendInquiry(SendMailRequest $request)
    {
        try {
            $data = collect([
                'full_name' => $request->get('full_name'),
                'email' => $request->get('email'),
                'message' => $request->get('message'),
            ]);

            // event(new SendMailInquiryEvent($data));

            return redirect()->route('thanks');
        } catch (Exception $exception) {
            return redirect()->back()->with('error-send', 'Something went wrong! Please try again later.');
        }
    }

    /**
     * Render page thanks
     *
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function thanks()
    {
        setDataMeta(
            collect([
                'page_title' => 'Thanks - Hion Coding Blogs',
                'page_description' => 'Thanks - Hion Coding Blogs share everything',
            ]),
            collect([
                'is_post' => false
            ]),
        );

        return view('client.pages.thanks');
    }
}
