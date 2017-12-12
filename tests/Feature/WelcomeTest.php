<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeTest extends TestCase
{
  public function testWelcome()
  {
    $response = $this->get('/');
    $response->assertStatus(200);
  }
}
