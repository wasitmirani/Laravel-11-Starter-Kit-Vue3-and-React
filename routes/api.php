<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\role\RoleController;
use App\Http\Controllers\backend\user\UserController;
use App\Http\Controllers\backend\media\UploadController;

Route::get('/me', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('/me', static fn () => response()->json(['user_name'=>"wasitmirani"]));
// ->middleware('auth:api')
Route::prefix('/app')->group(function () {
    Route::post('/password/update', [UserController::class, 'updatePassword']);
    Route::resource('user', UserController::class);
    Route::resource('role',RoleController::class);
    Route::prefix('upload')->group(function() {
        Route::post('/{type}/image',[UploadController::class,'uploadSingleImage']);
    });

});