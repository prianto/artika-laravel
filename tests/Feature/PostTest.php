<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
  public function testPost()
  {
    $response = $this->get('post');
    $response->assertStatus(404);
  }
}
