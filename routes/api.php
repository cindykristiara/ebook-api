<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HeloController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
//});

Route::get('hello', function(){
    return ["me" => "Hello, it's me Marcello Este"];
}); 

Route::resource('hellocello', HeloController::class);

Route::resource('siswa', SiswaController::class);
Route::resource('books', BookController::class)->except('create', 'edit', 'show', 'index');

Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    return $request->user();
});


//Public Route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('books', [BookController::class, 'index']);
// Route::get('books/{id}', [BookController::class, 'show']);
// Route::get('books', [BookController::class, 'store']);
// Route::get('books/{id}', [BookController::class, 'update']);
// Route::get('books/{id}', [AuthController::class, 'destroy']);

//Protected Routes
Route::middleware('auth:sanctum')->group(function (){
    Route::resource('book', BookController::class,);
    //Route::resource('books', BookController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
});
