<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = ServiceCategory::all();
        return view('services.categories', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = ServiceCategory::all();
        return view('services.categories', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // validate
          $request->validate([
            'name' => 'required|unique:scategories|max:255',
            'description' => 'string|min:1|nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        $messages = [
            'name.unique' => 'Category name must be unique.',
        ]);
        // dd($request->all());

        $user_id = Auth::user()->id;
        $name     =  $request->name;
        $slug      =  Str::slug($request->name);
        $description   =  $request->description;
        $file = $request->file('image');

        // Ok. Validated. everything is solid.

        $category = ServiceCategory::create([
            'name'     =>  $name,
            'slug'      =>  $slug,
            'description'   =>  $description
            ]);

        if ($request->hasfile('image'))  {
            $category->addMediaFromRequest('image')->toMediaCollection('category_image');
        }

        return redirect()->route('services.categories')->with('toast_success', trans($category->name . ' Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
         //
         $request->validate([
            'name' => 'required|unique:scategories|max:255',
            'description' => 'string|min:1|nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        $messages = [
            'name.unique' => 'Category name must be unique.',
        ]);

        $category = ServiceCategory::findOrFail($category);

        $name           =  $request->name;
        $description    =  $request->description;
        $slug           =  Str::slug($request->name);

        $category->update([
            'name' => $name,
            'description' => $description,
            'slug' => $slug,
        ]);

        return redirect()->back()->with('toast_success', trans($category->name . ' Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = ServiceCategory::findOrFail($id);
        $category->delete();
        return back()->with('toast_success', trans($category->name . ' Deleted Successfully'));
    }
}
