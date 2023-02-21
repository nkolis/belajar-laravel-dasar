<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
  public function testDependency()
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

    self::assertEquals('Nurkholis', $person1->firstName);
    self::assertEquals('Nurkholis', $person2->firstName);

    self::assertNotSame($person1, $person2);
  }

  public function testSingleton()
  {
    $this->app->singleton(Person::class, function () {
      return new Person("Nurkholis", "Setiawan");
    });
    $person1 = $this->app->make(Person::class);
    $person2 = $this->app->make(Person::class);

    self::assertEquals('Nurkholis', $person1->firstName);
    self::assertEquals('Nurkholis', $person2->firstName);

    self::assertSame($person1, $person2);
  }
  public function testInstance()
  {
    $person = new Person("Nurkholis", "Setiawan");
    $this->app->instance(Person::class, $person);
    $this->app->make(Person::class);
    $person1 = $this->app->make(Person::class);
    $person2 = $this->app->make(Person::class);

    self::assertEquals('Nurkholis', $person1->firstName);
    self::assertEquals('Nurkholis', $person2->firstName);

    self::assertSame($person1, $person2);
  }

  public function testDependencyInjection()
  {
    $this->app->singleton(Foo::class, function () {
      return new Foo;
    });
    $foo = $this->app->make(Foo::class);
    $bar = $this->app->make(Bar::class);

    self::assertSame($foo, $bar->foo);
  }

  public function testDependencyInjectionClosure()
  {
    $this->app->singleton(Foo::class, function () {
      return new Foo;
    });

    $this->app->singleton(Bar::class, function ($app) {
      $foo = $app->make(Foo::class);
      return new Bar($foo);
    });
    $foo = $this->app->make(Foo::class);
    $bar1 = $this->app->make(Bar::class);
    $bar2 = $this->app->make(Bar::class);


    self::assertSame($foo, $bar1->foo);
    self::assertSame($bar1, $bar2);
  }

  public function testDependencyInjectionInterfaceToClass()
  {
    $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

    $helloService = $this->app->make(HelloService::class);
    self::assertEquals("Halo kholis", $helloService->hello('kholis'));
  }
}
