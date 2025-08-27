<?php

use App\Http\Controllers\API\Auth\AuthenticationController;
use App\Http\Controllers\API\Project\ProjectController;
use App\Http\Controllers\API\BillboardController;
use App\Http\Controllers\API\Project\TransactionController;
use App\Http\Controllers\API\SummaryController;
use App\Http\Controllers\API\AdviceController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



///////////////// TESTING ////////////////////
Route::get('test', function(){
  return "connection exists";

});

/** ========== PUBLIC ENDPOINTS =========== */
Route::post('login', [AuthenticationController::class, 'login']);
Route::post('register', [AuthenticationController::class, 'register']);


Route::middleware( 'auth:api')->group(function () {



///////////////////  List of billboard apis ///////////////////////////////
Route::group(['prefix' => 'dashboard'], function () {

      //// top dashboard
      Route::get('billboard',[BillboardController::class, 'billboardList']);

       ////dashboard summary
      Route::get('summary',[SummaryController::class, 'transactionSummary']);

      //get latest transactions]]

      
      
      Route::get('transaction-list',[TransactionController::class,'transactionList']);


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

            Route::get('view',[ProjectController::class,'viewProject'])->name('viewProject');

            // Project collaborators management
            Route::get('listProjectUsers/{projectId}',[ProjectController::class,'listProjectUsers'])->name('api.project.listUsers');
            Route::post('attachUserToProject/{projectId}',[ProjectController::class,'attachUserToProject'])->name('api.project.attachUser');
            Route::post('detachUserFromProject/{projectId}',[ProjectController::class,'detachUserFromProject'])->name('api.project.detachUser');

            // Project-specific transactions and team members
            Route::get('{projectId}/transactions',[ProjectController::class,'getProjectTransactions'])->name('api.project.transactions');
            Route::get('{projectId}/team',[ProjectController::class,'getProjectTeam'])->name('api.project.team');



});

/** ===================== TRANSACTION REPORTING =========================== */
Route::group(['prefix' => 'transaction'], function () {

  Route::get('list',[TransactionController::class,'transactionList'])->name('api.transaction.list');

  Route::post('create',[TransactionController::class,'store'])->name('api.transaction.create');

  // New transaction reporting endpoints
  Route::get('reports',[TransactionController::class,'getTransactionReports'])->name('api.transaction.reports');
  Route::get('summary',[TransactionController::class,'getTransactionSummary'])->name('api.transaction.summary');

});


Route::group(['prefix'=> 'user'], function () {

  Route::get('/profile',[UserController::class,'getProfile'])->name('profile'); 
  Route::post('create',[UserController::class,'creatProjectMember'])->name('api.user.create');
}
);



});








