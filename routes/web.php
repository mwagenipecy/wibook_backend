<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {



    //return view('landing');

   return view('welcome');

});

Route::middleware([   
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/download-app', function () {
    $file = '/var/www/html/wibook_backend/wibook.apk';
    
    // Check if file exists
    if (!file_exists($file)) {
        abort(404);
    }
    
    $headers = [
        'Content-Type' => 'application/vnd.android.package-archive',
        'Content-Disposition' => 'attachment; filename="wibook.apk"',
    ];
    
    return response()->download($file, 'wibook.apk', $headers);
})->name('download.apk');



Route::post('comments',[CommentController::class,'saveComments'])->name('register.comment');
