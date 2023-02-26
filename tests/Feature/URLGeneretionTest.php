<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGeneretionTest extends TestCase
{
  public function testCurrent()
  {
    $this->get('/url/current/?name=eko')->assertSeeText('http://localhost/url/current?name=eko');
  }

  public function testNamed()
  {
    $this->get('/redirect/named')->assertSeeText('http://localhost/redirect/hello/kholis');
  }

  public function testAction()
  {
    $this->get('/url/action')->assertSeeText('http://localhost/form');
  }
}
