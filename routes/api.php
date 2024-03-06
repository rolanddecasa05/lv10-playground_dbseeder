<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Playground\SampleController;
use App\Http\Controllers\Notifications\NotificationController;
use App\Http\Controllers\Playground\UserRepositoryController;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [SampleController::class, 'index']);
Route::post('/notification/send', [NotificationController::class, 'send']);
Route::post('/mail/send', [NotificationController::class, 'sendEmail']);
Route::resource('/users', UserRepositoryController::class);


// pusher ..
// event triggered email
// redis queue listener
// repository pattern and response handler
// todo: json validator response, unit testing, file uploader, login and auth 
