<?php

use App\Http\Controllers\API\Auth\AuthenticationController;
use App\Http\Controllers\API\Project\ProjectController;
use App\Http\Controllers\API\BillboardController;
use App\Http\Controllers\API\SummaryController;
use App\Http\Controllers\API\AdviceController;
use App\Models\ProjectTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



///////////////// TESTING ////////////////////

Route::get('test', function(){
  return "connection exists";
});

/** ========== PUBLIC ENDPOINTS =========== */
Route::post('login', [AuthenticationController::class, 'login']);
Route::post('register', [AuthenticationController::class, 'register']);



///////////////////  List of billboard apis ///////////////////////////////
Route::group(['prefix' => 'dashboard'], function () {

      //// top dashboard
      Route::get('billboard',[BillboardController::class, 'billboardList']);

       ////dashboard summary
      Route::get('summary',[SummaryController::class, 'transactionSummary']);

      //get latest transactions
      Route::get('transaction-list',[ProjectTransaction::class,'index']);


      //advice here
      Route::get('advice',[AdviceController::class, 'index']);
});


/** ===================== CREATE /EDIT / VIEW AND DELETE PROJECT =========================== */
Route::group(['prefix' => 'project'], function () {

            // get  project list for perticular user
            Route::get('list',[ProjectController::class,'projectList'])->name('api.project.list');


            // create project
            Route::post("create",[ProjectController::class,'createProject'])->name('api.create.project');


            // update project

            Route::post("update/{id}",[ProjectController::class,'updateProject'])->name('api.update.project');



});
