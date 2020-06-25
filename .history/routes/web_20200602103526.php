<?php

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

Route::view('/','home');

Route::view('/contact','contact');

Route::get('/blog-post/{id}',function($id){
    $pages = [
        1 => [
            'title' => 'Hello from page 1'
        ],
        2 => [
            'title' => 'Hello from page 2'
        ]
    ]
    return view('blog-post',$pages[$id]);
});