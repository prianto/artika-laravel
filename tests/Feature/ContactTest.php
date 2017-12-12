<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
  public function testContact()
  {
    $response = $this->get('contact');
    $response->assertStatus(200);
    $response->assertSeeText('Contact Us');

    $response = $this->get('contact/sent');
    $response->assertRedirect('contact');
  }
}
