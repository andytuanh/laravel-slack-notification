<?php

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

use App\Notifications\TodoCompleted;
 
 
 
Route::get('done', function () {
 
$user = App\Admin::first();

$task = (object) [
    'id' => '1',
    'description' => '...',
	'title' => '...'
  ];
 
$user->notify(new TodoCompleted($task));
 
   //return view('welcome');
 
});


Route::get('foo', function () {
    return 'Hello World';
});