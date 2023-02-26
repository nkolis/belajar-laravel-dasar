<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FormController extends Controller
{
  public function form(): Response
  {
    return response()->view('form');
  }

  public function submitForm(Request $request): RedirectResponse
  {
    $name = $request->input('name');
    return redirect()->route('hello.name', ['name' => $name]);
  }
}
