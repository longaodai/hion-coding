<?php

namespace App\Listeners;

use App\Events\SendMailInquiryEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailInquiryListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendMailInquiryEvent  $event
     * @return void
     */
    public function handle(SendMailInquiryEvent $event)
    {
        $data = $event->data;
        // For client
        $options = [
            'title' => 'Thank you for contacting Hion Coding',
            'email_receiver' => $data->get('email'),
            'data' => $data,
        ];

        $this->send($options);

        // For admin
        $options = [
            'title' => 'Thank you for contacting Hion Coding',
            'email_receiver' => __('common.info_email_address'),
            'data' => $data,
        ];

        $this->send($options);
    }

    /**
     * Send mail
     *
     * @param $options
     * 
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    private function send($options)
    {
        Mail::send('emails.inquiry', $options, function ($message) use ($options) {
            $message->from(MAIL_INQUIRY_INFO['email'], MAIL_INQUIRY_INFO['name'])
                ->to($options['email_receiver'])
                ->subject($options['title']);
        });
    }
}
