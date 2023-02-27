<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
  public function testCreateSession()
  {
    $this->get('/session/create')
      ->assertSessionHas('User-Id', 'kholis')
      ->assertSessionHas('is-Member', 'true');
  }

  public function testGetSessionSuccess()
  {
    $this->withSession([
      'User-Id' => 'kholis',
      'is-Member' => 'true'
    ])->get('/session/get')
      ->assertJson([
        'userId' => 'kholis',
        'isMember' => 'true'
      ]);
  }

  public function testGetSessionFailed()
  {
    $this->get('/session/get')->assertJson([
      'userId' => 'guest',
      'isMember' => 'false'
    ]);
  }

  public function testDestroySession()
  {
    $this->withSession([
      'User-Id' => 'kholis',
      'is-Member' => 'true'
    ])->get('/session/destroy')->assertSeeText('Session destroyed');
  }
}
