<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContainerTest extends TestCase
{
  public function testDependencyInjection()
  {
    $foo1 = $this->app->make(Foo::class);
    $foo2 = $this->app->make(Foo::class);
    $bar = $this->app->make(Bar::class);

    self::assertEquals("Foo", $foo1->foo());
    self::assertEquals("Foo", $foo2->foo());
    self::assertNotSame($foo1, $foo2);
    self::assertEquals("Foo and bar", $bar->bar());
  }

  public function testBind()
  {
    $this->app->bind(Person::class, function () {
      return new Person("Nurkholis", "Setiawan");
    });
    $person1 = $this->app->make(Person::class);
    $person2 = $this->app->make(Person::class);

    self::assertNotNull($person1);
  }
}
