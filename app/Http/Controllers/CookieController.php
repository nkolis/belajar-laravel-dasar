<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
  public function createCookie(Request $request): Response
  {
    return response('Hello Cookie')
      ->cookie('User-id', 'kholis', 1000, '/')
      ->cookie('is-Member', 'true', 1000, '/');
  }

  public function getCookie(Request $request): JsonResponse
  {
    return response()->json([
      'userId' => $request->cookie('User-id', 'guest'),
      'isMember' => $request->cookie('is-Member', 'false'),
    ]);
  }

  public function clearCookie(Request $request): Response
  {
    return response('Clear Cookie')->withoutCookie('User-id')->withoutCookie('is-Member');
  }
}
