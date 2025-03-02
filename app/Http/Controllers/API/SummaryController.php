<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\SummaryResource;
use App\Models\User;
use Illuminate\Http\Request;

class SummaryController extends BaseController
{
    public function transactionSummary(){



        return $this->sendResponse(new SummaryResource(User::all()), "Successfully ", 201);


    }
}
