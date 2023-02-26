<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
  public function testCookie()
  {
    $this->get('/cookie/set')
      ->assertCookie('User-id', 'kholis')
      ->assertCookie('is-Member', 'true');
  }

  public function testGetCookie()
  {
    $this->withCookie('User-id', 'kholis')->withCookie('is-Member', 'true')
      ->get('/cookie/get')->assertJson([
        'userId' => 'kholis',
        'isMember' => 'true',
      ]);
  }

  public function testClearCookie()
  {
    $this->withCookie('User-id', 'kholis')->withCookie('is-Member', 'true')
      ->get('/cookie/clear')->assertCookieExpired('User-id')->assertCookieExpired('is-Member');
  }
}
