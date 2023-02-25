<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{

  public function testInput()
  {
    $this->get('/input/hello?name=Kholis')->assertSeeText('Hello Kholis');
    $this->post('/input/hello', ['name' => 'Kholis'])->assertSeeText('Hello Kholis');
  }

  public function testInputNested()
  {
    $this->post('/input/hello/first', ['name' => [
      'first' => 'Nurkholis',
      'last' => 'Setiawan'
    ]])->assertSeeText('Hello Nurkholis');
  }

  public function testInputAll()
  {
    $this->post('/input/hello/input', ['name' => [
      'first' => 'Nurkholis',
      'last' => 'Setiawan'
    ]])->assertSeeText('name')
      ->assertSeeText('first')->assertSeeText('Nurkholis')
      ->assertSeeText('last')->assertSeeText('Setiawan');
  }


  public function testInputArray()
  {
    $this->post('/input/hello/array', ['products' => [
      [
        'name' => 'Asus ROG',
        'price' => '30000000'
      ],
      [
        'name' => 'Samsung Galaxy S10',
        'price' => '30000000'
      ]
    ]])->assertSeeText('Asus ROG')->assertSeeText('Samsung Galaxy S10');
  }

  public function testInputType()
  {
    $this->post('/input/type', [
      'name' => 'Kholis',
      'married' => 'false',
      'birth_date' => '2000-06-21'
    ])->assertSeeText('Kholis')
      ->assertSeeText('false')
      ->assertSeeText('2000-06-21');
  }

  public function testInputOnly()
  {
    $this->post('/input/filter/only', [
      "name" => [
        "first" => "Nur",
        "middle" => "Kholis",
        "last" => "Setiawan",
      ]
    ])->assertSeeText('Nur')->assertSeeText('Setiawan')
      ->assertDontSeeText('Kholis');
  }

  public function testInputExcept()
  {
    $this->post('/input/filter/except', [
      "user" => "nkolis",
      "admin" => "true",
      "password" => "rahasia"
    ])->assertSeeText('nkolis')->assertSeeText('rahasia')
      ->assertDontSeeText('admin');
  }

  public function testInputMerge()
  {
    $this->post('/input/filter/merge', [
      "user" => "nkolis",
      "admin" => "true",
      "password" => "rahasia"
    ])->assertSeeText('nkolis')->assertSeeText('rahasia')
      ->assertSeeText('false');
  }
}
