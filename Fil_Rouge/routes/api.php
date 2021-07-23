<?php
use App\Http\Controllers\AdressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectLeaderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('adresss', AdressController::class);
Route::resource('categorys', CategoryController::class);
Route::resource('comments', CommentController::class);
Route::resource('orders', OrderController::class);
Route::resource('projects', ProjectController::class);
Route::resource('project_leader', ProjectLeaderController::class);
Route::resource('tags', TagController::class);
Route::resource('users', UserController::class);








Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
