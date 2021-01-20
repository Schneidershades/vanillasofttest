<?php

namespace Tests\Feature\Email;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailFormRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_email_form_requests()
    {
        $this->withOutExceptionHandling();
        $response = $this->post('api/send', $this->data());
        $response->assertOk();
    }

    public function data()
    {
        return [
           "emails" => "buskoms@yahoo.com", 
           "subject" => "Introduction", 
           "body" => "This is an introduction", 
           "attachments" => [] 
        ];
    }
}
