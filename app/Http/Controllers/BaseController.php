<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BaseController extends Controller
{

    public function sendResponse($result, $message, $code = 200)
    {
        try {
            // Ensure $result is in the correct format
            if (is_array($result) || $result instanceof \Illuminate\Contracts\Support\Arrayable) {
                $result = (object) $result;  // Convert arrays to objects for consistency
            }

            $response = [
                'success' => true,
                'data'    => $result ?? new \stdClass(), // Use empty object if result is null
                'message' => $message ?? 'Operation completed successfully.',
            ];

            return response()->json($response, $code);
        } catch (\Exception $e) {
            // Handle unexpected errors
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred while processing the response.',
                'error'   => $e->getMessage(),
            ], 500); // Internal Server Error
        }
    }

    public function sendError($error, $errorMessages = [], $code = 400)
    {
        try {
            // Resolve the error message from the config or use a default fallback
            $message = Config::get('appFeedbackMessage.' . $error) ?? 'An error occurred.';

            $response = [
                'status'  => "error",
                'message' => $message,
                'code'    => $code, // Include HTTP status code in the response
            ];

            // Include additional error details if available
            if (!empty($errorMessages)) {
                $response['data'] = $errorMessages;
            }

            return response()->json($response, $code);
        } catch (\Exception $e) {
            // Handle unexpected errors gracefully
            return response()->json([
                'status'  => "error",
                'message' => 'An unexpected error occurred while processing the error response.',
                'error'   => $e->getMessage(),
            ], 500); // Internal Server Error
        }
    }

    

}
