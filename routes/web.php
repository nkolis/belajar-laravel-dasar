<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('/pzn', function () {
  return "Programmer Zaman Now";
});

Route::redirect('/youtube', '/pzn');

Route::fallback(function () {
  return "404 Not Found By Kholis";
});

Route::view('/hello', 'hello', ['name' => 'kholis']);

Route::get('/hello-again',  function () {
  return view('hello', ['name' => 'kholis']);
});

Route::get('/hello-world',  function () {
  return view('hello.world', ['name' => 'kholis']);
});

Route::get('/product/{id}', function ($produkId) {
  return "Produk ID: $produkId";
})->name('product.detail');

Route::get('/product/{kategori}/{id}', function ($kategori, $produkId) {
  return "Produk ID: $produkId, Kategori: $kategori";
});

Route::get('categories/{id}', function ($kategoriId) {
  return "Kategori ID: $kategoriId";
})->where('id', '[0-9]+');

Route::get('users/{id?}', function ($userId = '404') {
  return "User: $userId";
});


Route::get('/conflict/kholis', function () {
  return 'conflict kholis';
});


Route::get('conflict/{name}', function ($name) {
  return "conflict $name";
});


Route::get('/produk/{id}', function ($id) {
  $link = route('product.detail', ['id' => $id]);
  return "Link: $link";
});

Route::get('/produk-redirect/{id}', function ($id) {
  return redirect()->route('product.detail', ['id' => $id]);
});

Route::get('/controller/hello/request', [HelloController::class, 'request']);
Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);

Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);

Route::post('/input/hello/first', [InputController::class, 'inputFirstName']);
Route::post('/input/hello/input', [InputController::class, 'helloInput']);
Route::post('/input/hello/array', [InputController::class, 'helloArray']);
Route::post('/input/type', [InputController::class, 'inputType']);
Route::post('/input/filter/only', [InputController::class, 'filterOnly']);
Route::post('/input/filter/except', [InputController::class, 'filterExcept']);
Route::post('/input/filter/merge', [InputController::class, 'filterMerge']);
