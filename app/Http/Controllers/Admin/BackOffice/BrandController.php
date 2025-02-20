<?php

namespace App\Http\Controllers\Admin\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view with all brands
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view with form to create a new brand
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 2MB max
        ]);
        
        // Handle Image Upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brands', 'public');
        } else {
            $imagePath = null;
        }
        
        $validatedData['image'] = $imagePath;

        // create a new brand
        $brand = Brand::create($validatedData);

        // redirect to the index page
        return redirect()->route('admin.brands.create')->with('success', 'Brand created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return view with the brand
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        // validate the request and update the brand
        $validatedData = $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 2MB max
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            #delete existing path and image
            if ($brand->image) {
                Storage::disk('public')->delete($brand->image);

            }

            $imagePath = $request->file('image')->store('brands', 'public');          

            $validatedData['image'] = $imagePath;
        } 


        // update the brand
        $brand->update($validatedData);

        // redirect to the index page
        return redirect()->route('admin.brands')->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete the brand
        $brand = Brand::findOrFail($id);
        if ($brand->image) {
            Storage::disk('public')->delete($brand->image);
        }
        $brand->delete();

        // redirect to the index page
        return redirect()->route('admin.brands')->with('success',  $brand->name . ' deleted successfully');
    }

    /**
     * Search for a brand
     */
    public function search(Request $request)
    {
        // search for a brand
        $search = $request->input('search');
        $brands = Brand::where('name', 'like', '%' . $search . '%')->get();

        // return view with the search results
        return view('admin.brands.index', compact('brands'));
    }
}
