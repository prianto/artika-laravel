<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchTest extends TestCase
{
  public function testSearch()
  {
    $response = $this->get('search');
    $response->assertStatus(200);
    $response->assertSeeText('Search');
  }
}
