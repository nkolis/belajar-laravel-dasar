<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
  public function testGetEnv()
  {
    $laravel = env("LARAVEL");
    self::assertEquals("Belajar Laravel Dasar", $laravel);
  }

  public function testDefaultEnv()
  {
    $author = env("AUTHOR", "KHOLIS");
    self::assertEquals("KHOLIS", $author);
  }
}
