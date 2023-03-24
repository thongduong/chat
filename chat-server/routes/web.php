<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comment', function (Illuminate\Http\Request $request) {
    $message = $request->input('message') ?: '';
    event(new App\Events\ChatEvent($message));
    return [
        'status' => true,
        'message' => $message
    ];
})->name('comment');

