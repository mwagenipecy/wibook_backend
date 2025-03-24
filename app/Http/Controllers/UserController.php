<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Services\ProjectUserService;

class UserController extends BaseController
{
    //

    protected $projectUserService;

    public function __construct(ProjectUserService $projectUserService)
    {
        $this->projectUserService = $projectUserService;
    }

    public function getProfile()
    {
        $authUserId = auth()->id(); // Get the authenticated user's ID
    
        // Retrieve users but prioritize the authenticated user
        $users = User::orderByRaw("id = ? DESC", [$authUserId])->get();
    
        return $this->sendResponse(UserResource::collection($users), "successfully", 200);
    }
    

    public function creatProjectMember(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^(07|06)\d{8}$/', 'unique:users'],
            // 'password' => 'required|string|min:8|confirmed',
            'device_token' => 'nullable|string',
            'email'=>'required|unique:users',
            'project_id' => 'required|exists:projects,id',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ], [
            'phone.regex' => 'The phone number must start with 07 or 06 and be exactly 10 digits long.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => Config::get('appFeedbackMessage.validation_failed'),
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {



            $password="123456789";
            // Create user
             $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($password),
                'status' => 'active',
                'device_token' => $request->device_token ? :''
             ]);


             //TODO  send email to user with login credentials
             $result = $this->projectUserService->assignUserToProject($user->id , $request->project_id);

             if (!$result['status']) {
                DB::rollBack();
                return $this->sendError($result['message'], 'User assignment failed', 500);
            }

            DB::commit();

            return $this->sendResponse(UserResource::collection( [$user] ),'created successfully',201);

        } catch (\Exception $e) {
            DB::rollBack();


            return $this->sendError($e->getMessage(), $e->getCode(),500);   

         
        }

    }
    
}
