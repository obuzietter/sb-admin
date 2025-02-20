<?php

namespace App\Http\Controllers\Admin\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view with all categories
        $categories = Category::orderBy('name')->get();

        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view for creating a new category
        $categories = Category::whereNull('parent_id')->orderBy('display_order')->get();
        $subcategories = Category::whereNotNull('parent_id')->get();
        return view('admin.categories.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate and store submitted data
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // 2MB max
            'is_active' => 'boolean',
        ]);

        $is_active = $validated['is_active'] ?? false;

        // Generate slug if not provided
        $slug = $validated['slug'] ?? Str::slug($validated['name']);

        // Ensure slug is unique
        $count = Category::where('slug', $slug)->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        // Handle Image Upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        } else {
            $imagePath = null;
        }

        // Create Category
        $category = Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'parent_id' => $validated['parent_id'] ?? null,
            'description' => $validated['description'] ?? null,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'image_url' => $imagePath,
            'is_active' => $is_active,
        ]);

        return redirect()->route('admin.categories.create')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return view with the category
        $category = Category::findOrFail($id);
        $categories = Category::whereNull('parent_id')->orderBy('display_order')->get();
        $subcategories = Category::whereNotNull('parent_id')->get();
        return view('admin.categories.edit', compact('category', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate and update the category
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            // 'slug' => 'nullable|string|max:255|unique:categories,slug,' . $id,
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // 2MB max
            'is_active' => 'boolean',
        ]);

        $is_active = $validated['is_active'] ?? false;

        // Generate slug if not provided
        $slug = Str::slug($validated['name']);

        // $validated['slug'] ?? 

        // Ensure slug is unique
        // $count = Category::where('slug', $slug)->count();
        // if ($count > 0) {
        //     $slug .= '-' . ($count + 1);
        // }

        // Find category
        $category = Category::findOrFail($id);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            // Delete old image
            if ($category->image_url) {
                Storage::disk('public')->delete($category->image_url);
            }
            $category->image_url = $imagePath;
        }

        // Update Category
        $category->name = $validated['name'];
        $category->slug = $slug;
        $category->parent_id = $validated['parent_id'] ?? null;
        $category->description = $validated['description'] ?? null;
        $category->meta_title = $validated['meta_title'] ?? null;
        $category->meta_description = $validated['meta_description'] ?? null;
        $category->meta_keywords = $validated['meta_keywords'] ?? null;
        $category->is_active = $is_active;
        $category->save();

        return redirect()->route('admin.categories', $id)->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete the category
        $category = Category::findOrFail($id);
        // dd($category);x`
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully!');
    }

    /**
     * Update the display order of the categories
     */

    public function updateOrder(Request $request)
    {
        try {
            // Validate request data
            $validated = $request->validate([
                'order' => 'required|array',
                'order.*.id' => 'required|integer|exists:categories,id',
            ]);
            
                foreach ($validated['order'] as $index => $item) {
                    // Find category or throw a 404 error if not found
                    $category = Category::findOrFail($item['id']);
                    $category->display_order = $index;
                    $category->save();
                }
            

            return response()->json([
                'success' => true,
                'message' => 'Category order updated successfully!'
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Log the error for debugging
            // Log::error('Error updating category order: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again.',
            ], 500);
        }
    }

    /**
     * Search for categories
     */
    public function search(Request $request)
    {
        // Search for a category
        $categories = Category::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('slug', 'like', '%' . $request->search . '%')
            ->paginate(20); // Fetches only 20 categories per request

        return view('admin.categories.index', compact('categories'));
    }   
}
