<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
  public function redirectTo(): string
  {
    return "Redirect to";
  }

  public function redirectFrom(Request $request): RedirectResponse
  {
    return redirect('/redirect/to');
  }

  public function redirectHello(string $name): string
  {
    return "Hello $name";
  }

  public function redirectName(): RedirectResponse
  {
    return redirect()->route('redirect.hello', ['name' => 'kholis']);
  }

  public function redirectAction(): RedirectResponse
  {
    return redirect()->action([RedirectController::class, 'redirectHello'], ['name' => 'kholis']);
  }

  public function redirectAway(): RedirectResponse
  {
    return redirect()->away('https://google.com');
  }
}
