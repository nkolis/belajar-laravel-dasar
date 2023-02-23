<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{

  public function testGet()
  {
    $response = $this->get('/pzn');
    $response->assertStatus(200)->assertSeeText('Programmer Zaman Now');
  }

  public function testRedirect()
  {
    $this->get('/youtube')->assertRedirect('/pzn');
  }

  public function testFallback()
  {
    $this->get('/tidakada')->assertStatus(200)->assertSeeText('404 Not Found By Kholis');
  }
}
