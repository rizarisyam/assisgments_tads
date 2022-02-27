<?php

use App\Http\Controllers\API\FacultyController;
use App\Http\Controllers\API\MajorController;
use App\Http\Controllers\API\StudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::name('api.')->group(function() {
    Route::apiResource('faculty', FacultyController::class);
    Route::apiResource('major', MajorController::class);
    Route::apiResource('student', StudentController::class);
});
