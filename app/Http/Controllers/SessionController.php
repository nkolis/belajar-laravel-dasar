<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
  public function createSession(Request $request): string
  {
    $request->session()->put('User-Id', 'kholis');
    $request->session()->put('is-Member', 'true');

    return "OK";
  }

  public function getSession(Request $request): JsonResponse
  {
    return response()->json([
      'userId' => $request->session()->get('User-Id', 'guest'),
      'isMember' => $request->session()->get('is-Member', 'false')
    ]);
  }

  public function destroySession(Request $request): string
  {
    $request->session()->forget('User-Id');
    $request->session()->forget('is-Member');

    return "Session destroyed";
  }
}
