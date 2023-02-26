<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContohMiddlewareTest extends TestCase
{
  public function testMiddlewareInvalid()
  {
    $this->get('/middleware/api')->assertSeeText('Access Denied')->assertStatus(401);
  }

  public function testMiddlewareValid()
  {
    $this->withHeader('X-API-KEY', 'PZN')->get('/middleware/api')
      ->assertSeeText('OK');
  }

  public function testMiddlewareInvalidGroup()
  {
    $this->get('/middleware/group')->assertSeeText('Access Denied')->assertStatus(401);
  }

  public function testMiddlewareValidGroup()
  {
    $this->withHeader('X-API-KEY', 'PZN')->get('/middleware/group')
      ->assertSeeText('GROUP');
  }
}
