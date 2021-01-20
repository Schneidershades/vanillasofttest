<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\GeneralMail;
use Illuminate\Support\Facades\Mail;

class GeneralEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emails = explode(',', $this->data['emails']);
        
        foreach ($emails as $key => $email) {

            $content = [           
                'to' => $email,
                'subject' => $this->data['subject'],
                'body' => $this->data['body'],
                'attachments' => $this->imageProcess($this->data['attachments']),
            ];

            Mail::to($email)->send(new GeneralMail($content));
        }
    }

    public function imageProcess($attachments)
    {
        $images = array();

        foreach ($attachments as $key => $attachment) {

            $item = base64_decode($attachment);
            $mime_type = finfo_buffer(finfo_open(), $item);
            $file_name = 'attachment_' .$attachment[$key] . '.' . $mime_type; 

            $rate = [ 
                'encode' => $attachment,
                'filename' => $file_name,
                'as' => $file_name,
                'mimetype' => $mime_type,
            ];

            $images[] = $rate;
        }

        return $images;
    }
}
