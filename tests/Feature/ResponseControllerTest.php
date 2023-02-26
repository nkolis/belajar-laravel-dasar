<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
  public function testResponse()
  {
    $response = $this->get('/response/hello');

    $response->assertStatus(200)->assertSeeText('Hello response');
  }

  public function testHeader()
  {
    $this->get('/response/header')->assertHeader('Content-Type', 'Application/Json')
      ->assertHeader('Author', 'Nurkholis Setiawan')
      ->assertHeader('App', 'Belajar Laravel Dasar')
      ->assertSeeText('Nurkholis')->assertSeeText('Setiawan');
  }

  public function testResponseView()
  {
    $this->get('/response/type/view')->assertStatus(200)
      ->assertHeader('Content-Type', 'text/html; charset=UTF-8')
      ->assertSeeText('World Kholis');
  }

  public function testResponseJson()
  {
    $this->get('/response/type/json')->assertStatus(200)
      ->assertHeader('Content-Type', 'application/json')
      ->assertJson(['firstname' => 'Nurkholis', 'lastname' => 'Setiawan']);
  }

  public function testResponseFile()
  {
    $this->get('/response/type/file')->assertStatus(200)
      ->assertHeader('Content-Type', 'image/png');
  }

  public function testResponseDownload()
  {
    $this->get('/response/type/download')->assertStatus(200)
      ->assertHeader('Content-Type', 'image/png')
      ->assertDownload('kholis.png');
  }
}
