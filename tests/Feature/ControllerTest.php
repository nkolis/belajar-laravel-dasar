<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{

  public function testHelloController()
  {
    $response = $this->get('/controller/hello/Kholis');

    $response->assertStatus(200)->assertSeeText('Halo Kholis');
  }

  public function testRequest()
  {
    $this->get('/controller/hello/request', ['Accept' => 'Plain/Text'])
      ->assertSeeText('Plain/Text')
      ->assertSeeText('hello/request')
      ->assertSeeText('http://localhost/controller/hello/request')
      ->assertSeeText('GET');
  }
}
