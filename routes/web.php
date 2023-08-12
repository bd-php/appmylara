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

Route::get('/about', function() {
    return "<h1>This is about page</h1>";
});

Route::get('/info/{i}', function($i){
    return "This is $i page";
});

Route::get('/details/{class}/{code}', function($class, $code){
    return "Course Details for Class $class and Code $code";
});

Route::get('/bari/{name}/{age}', function($name, $age){
    return "Name: $name & Age: $age";
});