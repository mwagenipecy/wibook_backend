<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\SummaryResource;
use App\Models\ProjectTransaction;
use App\Models\User;
use Illuminate\Http\Request;

class SummaryController extends BaseController
{
    public function transactionSummary(){

       $totalIncome=ProjectTransaction::where("user_id",auth()->user()->id)->where('type','income')->sum("amount");
       $totalExpenses=ProjectTransaction::where("user_id",auth()->user()->id)->where('type','expenditure')->sum("amount");
     
       if($totalIncome> 0){

     
       $data=[

        "balance"=> $totalIncome - $totalExpenses ,
        'percent'=> ($totalExpenses/$totalIncome )*100,
       ];
    }else{
        $data=[
            'balance'=>  $totalIncome - $totalExpenses,
            'percent'=> 0,
        ];

    }

        return $this->sendResponse(new SummaryResource($data), "Successfully ", 201);


    }
}
