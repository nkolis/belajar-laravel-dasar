<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{

  public function testGet()
  {
    $response = $this->get('/pzn');
    $response->assertStatus(200)->assertSeeText('Programmer Zaman Now');
  }

  public function testRedirect()
  {
    $this->get('/youtube')->assertRedirect('/pzn');
  }

  public function testFallback()
  {
    $this->get('/tidakada')->assertStatus(200)->assertSeeText('404 Not Found By Kholis');
  }

  public function testParameter()
  {
    $this->get('/product/prod-123')->assertSeeText("Produk ID: prod-123");
    $this->get('/product/komputer/prod-123')->assertSeeText("Produk ID: prod-123, Kategori: komputer");
  }

  public function testParameterRegex()
  {
    $this->get('/categories/1323')->assertSeeText('Kategori ID: 1323');
    $this->get('/categories/132dfdf3')->assertSeeText('404 Not Found');
  }

  public function testParameterOptional()
  {
    $this->get('/users/123')->assertSeeText('User: 123');
    $this->get('/users')->assertSeeText('User: 404');
  }

  public function testRouteConflict()
  {
    $this->get('/conflict/kholis')->assertSeeText('conflict kholis');
    $this->get('/conflict/setiawan')->assertSeeText('conflict setiawan');
  }

  public function testRouteNamed()
  {
    $this->get('/produk/123')->assertSeeText('Link: http://localhost/product/123');
    $this->get('/produk-redirect/123')->assertRedirect('/product/123');
  }
}
