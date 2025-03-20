<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\BillboardResource;
use App\Models\Billboard;
use Illuminate\Http\Request;

class BillboardController extends BaseController
{


    public function billboardList(Request $request){

        $query=Billboard::query();
        if($request->has('id')){
            $query->where('id',$request->id);
        }
        $output= $query->get();
        return $this->sendResponse(BillboardResource::collection($output), "Successfully created", 201);
    }

    
    //
}
