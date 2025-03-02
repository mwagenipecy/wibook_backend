<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends BaseController
{
    protected $otpService;
    public function login(Request $request)
    {
        // Step 1: Validate request input
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'regex:/^(07|06)\d{8}$/'],
            'password' => 'required|string|min:8',
        ], [
            'phone.regex' => 'The phone number must start with 07 or 06 and be exactly 10 digits long.',
            'password.required' => 'Password is required.',
        ]);

        Log::info('start validation');
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => Config::get('appFeedbackMessage.validation_failed'),
                'errors' => $validator->errors()
            ], 422);

        }

        Log::info('validation passed');

        try {
            // Step 2: Find user and validate password within a transaction
            $user = DB::transaction(function () use ($request)
            {
                $user = User::where('phone', $request->phone)->first();

                // Check if user exists and password is correct
                if (!$user || !Hash::check($request->password, $user->password)) {
                    throw new \Exception(Config::get('appFeedbackMessage.user_not_found'));
                }

                return $user;
            });

            Log::info('user exists');
            // Step 3: Create token after successful user retrieval and validation
            $tokenResult = $user->createToken('authToken');
            //$tokenResult->token->expires_at = Carbon::now()->addWeeks(1);

            $tokenResult->token->save();

            Log::info('saved token');

            return response()->json([
                'success' => true,
                'message' => Config::get('appFeedbackMessage.login_success'),
                'data' => [
                    'user' => new UserResource($user),
                    'token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => $tokenResult->token->expires_at->toDateTimeString(),
                ]
            ], 201);

        } catch (\Exception $e) {
            // Step 4: Catch errors and respond with appropriate message
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() === Config::get('appFeedbackMessage.user_not_found')
                    ? Config::get('appFeedbackMessage.user_not_found')
                    : 'An error occurred while logging in. Please try again.'.$e->getMessage(),
            ], 401);
        }
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^(07|06)\d{8}$/', 'unique:users'],
            'password' => 'required|string|min:8|confirmed',
            'device_token' => 'nullable|string',
            'email'=>'required|unique:users',
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



            // Create user
             $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => 'active',
                'device_token' => $request->device_token ? :''
             ]);



            $tokenResult = $user->createToken('authToken');
            $token = $tokenResult->accessToken;  // This will give you the token string


            // Set token expiration
           //  $tokenResult->token->expires_at = Carbon::now()->addWeeks(1);
            $tokenResult->token->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => Config::get('appFeedbackMessage.REGISTERED_SUCCESSFULLY'),
                'data' => [
                    'user' => new UserResource($user),
                    'token' => $token,
                    'token_type' => 'Bearer',
                   // 'expires_at' => $tokenResult->token->expires_at->toDateTimeString(),
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Registration failed due to an unexpected error.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            // Step 1: Get the authenticated user
            $user = auth()->user();

            // Check if the user exists
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found.'
                ], 404);
            }

            // Step 2: Check if at least one input is provided
            if (!$request->hasAny(['name', 'profile_photo_path'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'At least one input (name or profile photo) must be provided.'
                ], 400);
            }

            // Step 3: Define validation rules
            $validator = Validator::make($request->all(), [
                'name' => 'nullable|string|max:255',
                'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Step 4: Update user within a transaction
            DB::transaction(function () use ($request, $user) {
                if ($request->filled('name')) {
                    $user->name = $request->name;
                }

                if ($request->hasFile('profile_photo_path')) {
                    $path = $request->file('profile_photo_path')->store('images', 'public');
                    $relativePath = Storage::url($path);
                    $fullUrl = URL::to($relativePath);
                    $user->profile_photo_path = $fullUrl;
                }

                $user->save();
            });

            // Step 5: Return success response
            return response()->json([
                'success' => true,
                'message' => 'User updated successfully.',
                'data' => new UserResource($user)
            ], 200);

        } catch (\Exception $e) {
            // Step 6: Handle errors
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the user. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            // Perform the logout operation in a transaction
            DB::transaction(function () use ($request) {

                // Revoke the user's current token
                $request->user()->token()->revoke();
            });

            // Return a successful response
            return response()->json([
                'success' => true,
                'message' => Config::get('appFeedbackMessage.logout_success')
            ], 200);

        } catch (\Exception $e) {
            // Handle any errors that occur during the transaction
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during logout. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function deleteAccount()
    {
        DB::beginTransaction();

        try {
            $userId = auth()->user()->id;
            auth()->user()->token()->revoke();
            User::where('id', $userId)->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => Config::get('appFeedbackMessage.LOGOUT_SUCCESS')
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during logout. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
