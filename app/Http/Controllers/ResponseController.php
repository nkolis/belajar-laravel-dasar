<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
  public function response(Request $request): Response
  {
    return response('Hello response');
  }

  public function header(Request $request): Response
  {
    $body = ['firstname' => 'Nurkholis', 'lastname' => 'Setiawan'];
    return response(json_encode($body), 200)->header('Content-Type', 'Application/Json')
      ->withHeaders([
        'Author' => 'Nurkholis Setiawan',
        'App' => 'Belajar Laravel Dasar'
      ]);
  }

  public function responseView(Request $request): Response
  {
    return response()->view('hello.world', ['name' => 'Kholis'], 200);
  }

  public function responseJson(Request $request): JsonResponse
  {
    $body = ['firstname' => 'Nurkholis', 'lastname' => 'Setiawan'];
    return response()->json($body);
  }

  public function responseFile(Request $request): BinaryFileResponse
  {
    return response()->file(storage_path('app/public/pictures/kholis.png'));
  }

  public function responseDownload(Request $request): BinaryFileResponse
  {
    return response()->download(storage_path('app/public/pictures/kholis.png'));
  }
}
