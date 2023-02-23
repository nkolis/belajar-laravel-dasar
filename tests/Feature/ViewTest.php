<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
  function testHelloView()
  {
    $this->get('/hello')->assertStatus(200)
      ->assertSeeText('Halo kholis');

    $this->get('/hello-again')->assertStatus(200)
      ->assertSeeText('Halo kholis');
  }

  function testHellowViewNested()
  {
    $this->get('/hello-world')->assertStatus(200)
      ->assertSeeText('World kholis');
  }

  function testTemplate()
  {
    $this->view('hello', ['name' => 'kholis'])->assertSeeText('Halo kholis');
    $this->view('hello.world', ['name' => 'kholis'])->assertSeeText('World kholis');
  }
}
