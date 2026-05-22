<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Events\MessageNotification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PurchasePlanController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/agentify', function () {
    return Inertia::render('AgentifyBusiness');
})->name('Agent');

Route::get('/email',[EmailsController::class, 'email']);

Route::middleware('guest')->group(function() {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/purchase-plan', [PurchasePlanController::class, 'store']);
    Route::get('/notifications/unread-count', function (Request $request) {
        return $request->user()->unreadNotifications()->count();
    });

    Route::get('/notifications', function (Request $request) {
        return $request->user()->notifications;
    });

    Route::post('/notifications/read', function (Request $request) {
        $request->user()->unreadNotifications->markAsRead();
        return response()->json(['success' => true]);
    });

});

Route::get('/event', function(){
    event(new MessageNotification('this is our first broadcast message')); 
});

Route::get('/listen', function(){
    return view('listen'); 
});

Route::get('/news', [NewsLetterController::class, 'index']);
Route::post('/sub',[NewsLetterController::class, 'sub'] );

Route::get('/playground',function(){
event(new App\Events\PlayGroundEvent());
$url=URL::temporarySignedRoute('share-video' , now()->addSeconds(30),
[
    'video'=>123
]);
return $url;
return null;
});
