<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{

  public function testHelloController()
  {
    $response = $this->get('/controller/hello');

    $response->assertStatus(200)->assertSeeText('Hello World');
  }
}
