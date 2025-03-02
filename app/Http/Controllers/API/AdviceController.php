<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdviceResource;
use App\Models\Advice;
use Illuminate\Http\Request;

class AdviceController extends BaseController
{

    public function index()
    {
        $advices = Advice::latest()->paginate(10);
        return $this->sendResponse(AdviceResource::collection($advices), 'List retrieved successfully', 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'description' => 'nullable|string',
                'image_url' => 'nullable|string',
                'status' => 'nullable|string',
            ]);

            $advice = Advice::create($validated);

            return $this->sendResponse(new AdviceResource($advice), 'Advice created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Something went wrong', 500);
        }
    }

    public function show($id)
    {
        $advice = Advice::findOrFail($id);
        return $this->sendResponse(new AdviceResource($advice), 'Advice retrieved successfully', 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $advice = Advice::findOrFail($id);

            $validated = $request->validate([
                'description' => 'nullable|string',
                'image_url' => 'nullable|string',
                'status' => 'nullable|string',
            ]);

            $advice->update($validated);

            return $this->sendResponse(new AdviceResource($advice), 'Advice updated successfully', 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Something went wrong', 500);
        }
    }

    public function destroy($id)
    {
        try {

            $advice = Advice::findOrFail($id);
            $advice->delete();

            return $this->sendResponse(null, 'Advice deleted successfully', 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Something went wrong', 500);
        }
    }

    //
}
