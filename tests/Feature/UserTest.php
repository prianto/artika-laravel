<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
  public function testUser()
  {
    $response = $this->get('user');
    $response->assertStatus(404);
  }
}
