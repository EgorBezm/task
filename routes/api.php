<?php

use App\Http\Controllers\API\TasksApiController;
use App\Http\Controllers\API\UserApiController;
use App\Http\Controllers\API\WorkspaceApiController;
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

Route::post('registration', [UserApiController::class, 'registration'])->name('registration');
Route::post('login', [UserApiController::class, 'login'])->name('loginApi');
Route::post('user/update/emoji', [UserApiController::class, 'updateEmoji']);
Route::post('user/password/reset', [UserApiController::class, 'resetPassword']);

Route::post('tasks', [TasksApiController::class, 'store']);
Route::post('tasks/create', [TasksApiController::class, 'create']);
Route::post('tasks/change', [TasksApiController::class, 'change']);
Route::post('tasks/change/status', [TasksApiController::class, 'changeStatus']);
Route::post('tasks/delete', [TasksApiController::class, 'delete']);

Route::post('workspace/create', [WorkspaceApiController::class, 'create']);
Route::post('workspace/change', [WorkspaceApiController::class, 'change']);
Route::post('workspace/delete', [WorkspaceApiController::class, 'delete']);
