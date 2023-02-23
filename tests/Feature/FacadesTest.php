<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadesTest extends TestCase
{
  public function testConfig()
  {
    $firstName1 = config("contoh.author.first");
    $firstName2 = Config::get("contoh.author.first");

    self::assertEquals("Nurkholis", $firstName1);
    self::assertEquals("Nurkholis", $firstName2);
    self::assertSame($firstName1, $firstName2);

    // var_dump(Config::all());
  }

  public function testConfigDependency()
  {
    $firstName1 = config("contoh.author.first");
    $firstName2 = Config::get("contoh.author.first");
    $config = $this->app->make("config");
    $firstName3 = $config->get("contoh.author.first");

    self::assertEquals("Nurkholis", $firstName1);
    self::assertEquals("Nurkholis", $firstName2);
    self::assertEquals("Nurkholis", $firstName3);
    self::assertSame($firstName1, $firstName2);

    // var_dump(Config::all());
  }

  public function testFacadeMock()
  {
    Config::shouldReceive('get')->with('contoh.author.first')->andReturn('Kholis keren');

    $firstName = Config::get('contoh.author.first');
    self::assertEquals('Kholis keren', $firstName);
  }
}
