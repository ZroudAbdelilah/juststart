<?php
use App\Http\Controllers\AdressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectLeaderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthProjectLeaderController;
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
// Public routes
Route::resource('adresss', AdressController::class);
Route::resource('categorys', CategoryController::class);
Route::resource('comments', CommentController::class);
Route::resource('orders', OrderController::class);
Route::resource('projects', ProjectController::class);
Route::resource('project_leader', ProjectLeaderController::class);
Route::resource('tags', TagController::class);
Route::resource('users', UserController::class);

Route::get('projects/search/{name}',[ProjectController::class,'search']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/leaderproject/register',[AuthProjectLeaderController::class,'register']);
Route::post('/leaderproject/login',[AuthProjectLeaderController::class,'login']);
//Protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    //
   Route::get('projects/search/{name}',[ProjectController::class,'search']);

   Route::post('/logout',[AuthController::class,'logout']);
   Route::post('/leaderproject/logout',[AuthProjectLeaderController::class,'logout']);
});





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth:sanctum'])->prefix('/admin')->group(function () {
    require_once __DIR__.'/custom/admin.php';
});
Route::middleware(['auth:sanctum'])->prefix('/leader')->group(function () {
    require_once __DIR__.'/custom/leader.php';
});
Route::middleware(['auth:sanctum'])->prefix('/user')->group(function () {
    require_once __DIR__.'/custom/user.php';
});


Route::get('/progress', function () {
    return ["progress" => rand(10,99)];
});