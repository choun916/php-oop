<?php

use Illuminate\Support\Facades\Route;
use PhpOop\Core\Php_oop;

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
    $php_oop = new Php_oop();
    print_r($php_oop->hello());
    return view('welcome');
});
