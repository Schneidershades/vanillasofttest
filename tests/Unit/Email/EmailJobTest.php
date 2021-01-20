<?php

namespace Tests\Unit\Email;

use PHPUnit\Framework\TestCase;
use App\Jobs\GeneralEmailJob;

class EmailJobTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_email_job()
	{
	    // $job = new GeneralEmailJob($this->data());
	    // $job->handle();
        // $this->assertStatus(200);
	}

	public function data()
    {
        return [
           "emails" => "buskoms@yahoo.com, vanilasoft@gmail.com", 
           "subject" => "introduction", 
           "body" => "This is an introduction", 
           "attachments" => ['ninio'] 
        ];
    }
}
