<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CategoryController extends BaseController
{
    /**
     * Get all categories for the authenticated user
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            
            $categories = Category::forUser($user->id)
                ->active()
                ->orderBy('name')
                ->get();

            Log::info('Categories fetched successfully', [
                'user_id' => $user->id,
                'categories_count' => $categories->count()
            ]);

            return $this->sendResponse($categories, 'Categories retrieved successfully');
        } catch (\Exception $e) {
            Log::error('Failed to fetch categories', [
                'user_id' => $request->user()->id ?? null,
                'error' => $e->getMessage()
            ]);

            return $this->sendError('Failed to fetch categories', $e->getMessage());
        }
    }

    /**
     * Get categories by type (income, expense, both)
     */
    public function getByType(Request $request, $type)
    {
        try {
            $user = $request->user();
            
            $categories = Category::forUser($user->id)
                ->active()
                ->byType($type)
                ->orderBy('name')
                ->get();

            Log::info('Categories by type fetched successfully', [
                'user_id' => $user->id,
                'type' => $type,
                'categories_count' => $categories->count()
            ]);

            return $this->sendResponse($categories, "Categories for $type retrieved successfully");
        } catch (\Exception $e) {
            Log::error('Failed to fetch categories by type', [
                'user_id' => $request->user()->id ?? null,
                'type' => $type,
                'error' => $e->getMessage()
            ]);

            return $this->sendError('Failed to fetch categories', $e->getMessage());
        }
    }

    /**
     * Store a new category
     */
    public function store(Request $request)
    {
        try {
            $user = $request->user();

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:500',
                'icon' => 'nullable|string|max:100',
                'color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/',
                'type' => 'required|in:income,expense,both'
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error', $validator->errors(), 422);
            }

            // Check if category name already exists for this user
            $existingCategory = Category::forUser($user->id)
                ->where('name', $request->name)
                ->where('type', $request->type)
                ->first();

            if ($existingCategory) {
                return $this->sendError('Category already exists', 'A category with this name and type already exists', 409);
            }

            $category = Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'icon' => $request->icon ?? 'category',
                'color' => $request->color ?? '#4F46E5',
                'type' => $request->type,
                'user_id' => $user->id,
                'is_active' => true
            ]);

            Log::info('Category created successfully', [
                'user_id' => $user->id,
                'category_id' => $category->id,
                'category_name' => $category->name
            ]);

            return $this->sendResponse($category, 'Category created successfully', 201);
        } catch (\Exception $e) {
            Log::error('Failed to create category', [
                'user_id' => $request->user()->id ?? null,
                'error' => $e->getMessage(),
                'request_data' => $request->all()
            ]);

            return $this->sendError('Failed to create category', $e->getMessage());
        }
    }

    /**
     * Update an existing category
     */
    public function update(Request $request, $id)
    {
        try {
            $user = $request->user();

            $category = Category::forUser($user->id)->find($id);

            if (!$category) {
                return $this->sendError('Category not found', 'The requested category was not found', 404);
            }

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:500',
                'icon' => 'nullable|string|max:100',
                'color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/',
                'type' => 'required|in:income,expense,both',
                'is_active' => 'boolean'
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error', $validator->errors(), 422);
            }

            // Check if category name already exists for this user (excluding current category)
            $existingCategory = Category::forUser($user->id)
                ->where('name', $request->name)
                ->where('type', $request->type)
                ->where('id', '!=', $id)
                ->first();

            if ($existingCategory) {
                return $this->sendError('Category already exists', 'A category with this name and type already exists', 409);
            }

            $category->update([
                'name' => $request->name,
                'description' => $request->description,
                'icon' => $request->icon ?? $category->icon,
                'color' => $request->color ?? $category->color,
                'type' => $request->type,
                'is_active' => $request->is_active ?? $category->is_active
            ]);

            Log::info('Category updated successfully', [
                'user_id' => $user->id,
                'category_id' => $category->id,
                'category_name' => $category->name
            ]);

            return $this->sendResponse($category, 'Category updated successfully');
        } catch (\Exception $e) {
            Log::error('Failed to update category', [
                'user_id' => $request->user()->id ?? null,
                'category_id' => $id,
                'error' => $e->getMessage()
            ]);

            return $this->sendError('Failed to update category', $e->getMessage());
        }
    }

    /**
     * Delete a category (soft delete by setting is_active to false)
     */
    public function destroy(Request $request, $id)
    {
        try {
            $user = $request->user();

            $category = Category::forUser($user->id)->find($id);

            if (!$category) {
                return $this->sendError('Category not found', 'The requested category was not found', 404);
            }

            // Check if category is being used in transactions
            $transactionCount = $category->transactions()->count();
            
            if ($transactionCount > 0) {
                // Soft delete - set as inactive instead of deleting
                $category->update(['is_active' => false]);
                
                Log::info('Category deactivated (has transactions)', [
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'transaction_count' => $transactionCount
                ]);

                return $this->sendResponse(null, 'Category deactivated successfully (transactions preserved)');
            } else {
                // Hard delete if no transactions
                $category->delete();
                
                Log::info('Category deleted successfully', [
                    'user_id' => $user->id,
                    'category_id' => $id
                ]);

                return $this->sendResponse(null, 'Category deleted successfully');
            }
        } catch (\Exception $e) {
            Log::error('Failed to delete category', [
                'user_id' => $request->user()->id ?? null,
                'category_id' => $id,
                'error' => $e->getMessage()
            ]);

            return $this->sendError('Failed to delete category', $e->getMessage());
        }
    }

    /**
     * Create default categories for a new user
     */
    public function createDefaults(Request $request)
    {
        try {
            $user = $request->user();

            $defaultCategories = [
                // Expense categories
                ['name' => 'Food & Dining', 'description' => 'Restaurant, groceries, and food expenses', 'icon' => 'restaurant', 'color' => '#F59E0B', 'type' => 'expense'],
                ['name' => 'Transportation', 'description' => 'Fuel, public transport, taxi expenses', 'icon' => 'directions_car', 'color' => '#3B82F6', 'type' => 'expense'],
                ['name' => 'Office Supplies', 'description' => 'Stationery, equipment, and office materials', 'icon' => 'business_center', 'color' => '#8B5CF6', 'type' => 'expense'],
                ['name' => 'Marketing', 'description' => 'Advertising and promotional expenses', 'icon' => 'campaign', 'color' => '#EC4899', 'type' => 'expense'],
                ['name' => 'Utilities', 'description' => 'Electricity, internet, phone bills', 'icon' => 'electrical_services', 'color' => '#10B981', 'type' => 'expense'],
                ['name' => 'Professional Services', 'description' => 'Legal, accounting, consulting fees', 'icon' => 'work', 'color' => '#6B7280', 'type' => 'expense'],
                
                // Income categories
                ['name' => 'Sales Revenue', 'description' => 'Income from product or service sales', 'icon' => 'point_of_sale', 'color' => '#059669', 'type' => 'income'],
                ['name' => 'Consulting Income', 'description' => 'Income from consulting services', 'icon' => 'psychology', 'color' => '#0891B2', 'type' => 'income'],
                ['name' => 'Investment Returns', 'description' => 'Returns from investments', 'icon' => 'trending_up', 'color' => '#7C3AED', 'type' => 'income'],
                ['name' => 'Grants & Funding', 'description' => 'Grants and funding received', 'icon' => 'volunteer_activism', 'color' => '#DC2626', 'type' => 'income'],
            ];

            $createdCategories = [];

            foreach ($defaultCategories as $categoryData) {
                // Check if category already exists
                $existingCategory = Category::forUser($user->id)
                    ->where('name', $categoryData['name'])
                    ->where('type', $categoryData['type'])
                    ->first();

                if (!$existingCategory) {
                    $category = Category::create([
                        'name' => $categoryData['name'],
                        'description' => $categoryData['description'],
                        'icon' => $categoryData['icon'],
                        'color' => $categoryData['color'],
                        'type' => $categoryData['type'],
                        'user_id' => $user->id,
                        'is_active' => true
                    ]);

                    $createdCategories[] = $category;
                }
            }

            Log::info('Default categories created', [
                'user_id' => $user->id,
                'created_count' => count($createdCategories)
            ]);

            return $this->sendResponse($createdCategories, 'Default categories created successfully');
        } catch (\Exception $e) {
            Log::error('Failed to create default categories', [
                'user_id' => $request->user()->id ?? null,
                'error' => $e->getMessage()
            ]);

            return $this->sendError('Failed to create default categories', $e->getMessage());
        }
    }
}
