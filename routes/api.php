<?php

use App\Http\Controllers\Api\ChatApiController;
use App\Http\Controllers\Api\UserApiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')
->middleware('auth:web')
->group(function() {
    Route::get('/users', [UserApiController::class, 'index']);

    Route::post('/messages', [ChatApiController::class, 'store']);
    Route::get('/messages/{id}', [ChatApiController::class, 'messagesWithUser']);
});

Route::get('/', function() {
    return ['message' => 'ok'];
});