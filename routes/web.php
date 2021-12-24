<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeControl;
use App\Http\Controllers\adminControl;
use App\Http\Controllers\userControl;

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

Route::view('/', 'index');

Route::get('redirect', [homeControl::class, 'redirectFunct']);

//admin
Route::get('users',[adminControl::class,'userList']); //view users list
Route::get('edit-user/{id}',[adminControl::class,'showUser']); //show user to edit
Route::POST('upd/user',[adminControl::class, 'updateUser']); //update to db
Route::get('add-project', [userControl::class, 'viewAddProject']); //OK
Route::POST('add/proj',[userControl::class, 'addProject']); //add project to db //ERROR SIKIT TAK MASUK DB

//user
Route::get('profile',[userControl::class,'profile']); //view profile //OK
Route::get('edit-profile',[userControl::class,'showProfile']); //form //OK
Route::POST('upd/profile',[userControl::class, 'updateProfile']); //update to db //OK

Route::get('project',[userControl::class, 'projectList']); //project list //OK BUT NO NOT CONNECTING NUMBER & CLIENT
Route::get('edit-project/{id}',[userControl::class, 'showProject']); //show form of proj to edit //ERROR
Route::POST('upd/project',[userControl::class, 'updateProject']); //update to db 

Route::get('edit-members/{id}',[userControl::class, 'editMembers']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
