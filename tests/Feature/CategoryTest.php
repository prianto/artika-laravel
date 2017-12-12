<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
  public function testCategory()
  {
    $response = $this->get('category');
    $response->assertStatus(404);

    $response = $this->get('category/all');
    $response->assertStatus(200);
    $response->assertSeeText('Category: All');
  }

}
