<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
  public function testRedirect()
  {
    $this->get('/redirect/from')->assertRedirect('http://localhost/redirect/to');
  }

  public function testRedirectHello()
  {
    $this->get('/redirect/name')->assertRedirect('/redirect/hello/kholis');
  }


  public function testRedirectAction()
  {
    $this->get('/redirect/action')->assertRedirect('/redirect/hello/kholis');
  }

  public function testRedirectAway()
  {
    $this->get('/redirect/google')->assertRedirect('https://google.com');
  }
}
