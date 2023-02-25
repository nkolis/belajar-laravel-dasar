<?php

namespace App\Http\Controllers;

use App\Services\HelloService;
use Illuminate\Http\Request;

class HelloController extends Controller
{

  private HelloService $helloSevice;

  public function __construct(HelloService $helloService)
  {
    $this->helloSevice = $helloService;
  }

  public function hello(string $name): string
  {
    return $this->helloSevice->hello($name);
  }

  public function request(Request $request)
  {
    return $request->header('Accept') . PHP_EOL .
      $request->path() . PHP_EOL .
      $request->url() . PHP_EOL .
      $request->method() . PHP_EOL;
  }
}
