<?php
use Webman\Route;


Route::group('/user', function () {
    Route::get('/index', [App\Controller\Index::class, 'index']);
    // Route::post('/login', [App\Controller\User::class, 'login']);
})->middleware([]);

Route::group('/user', function () {
    // Route::post('/logout', [App\Controller\User::class, 'logout']);
    // Route::post('/info', [App\Controller\User::class, 'info']);
    // Route::post('/menu', [App\Controller\User::class, 'menu']);
 })->middleware([
     App\Middleware\Auth::class,
 ]);