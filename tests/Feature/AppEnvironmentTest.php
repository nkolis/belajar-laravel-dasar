<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AppEnvironmentTest extends TestCase
{
  public function testAppEnv()
  {
    self::assertTrue(App::environment(['testing']));
  }
}
