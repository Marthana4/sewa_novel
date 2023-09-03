<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [UserController::class,'login']);
Route::post('/register', [UserController::class,'register']);

Route::group(['middleware'=>['api.admin']], function(){
    Route::get('/user', [UserController::class,'index']);
    Route::delete('/user-delete/{id}', [UserController::class,'destroy']);
    Route::get('/novel', [NovelController::class,'index']);
    Route::post('/novel-create', [NovelController::class,'store']);
    Route::put('/novel-update/{id}', [NovelController::class,'update']);
    Route::delete('/novel-delete/{id}', [NovelController::class,'destroy']);
    Route::get('/transaksi', [TransaksiController::class,'index']);
    Route::put('/pengembalian/{id}', [TransaksiController::class,'update']);
    Route::delete('/transaksi-delete/{id}', [TransaksiController::class,'destroy']);
});

Route::group(['middleware'=>['api.penyewa']], function(){
    Route::put('/user-update/{id}', [UserController::class,'update']);
    Route::post('/form-sewa', [TransaksiController::class,'store']);
    
});

Route::group(['middleware'=>['jwt.verify']], function() {
    Route::post('/logout', [UserController::class,'logout']);
});
