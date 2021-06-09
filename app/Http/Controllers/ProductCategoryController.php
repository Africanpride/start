<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('products.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:categories|max:255',
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

        $category = ProductCategory::create([
            'name'     =>  $name,
            'slug'      =>  $slug,
            'description'   =>  $description
            ]);

        if ($request->hasfile('image'))  {
            $category->addMediaFromRequest('image')->toMediaCollection('category_image');
        }

        // return redirect()->route('products.create')->with('success_message', trans('Category: '. '<b>' . $category->name .  '</b>'. ' Added Successfully'));

        return redirect()->route('products.categories')->with('toast_success', trans($category->name . ' Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //

        dd('You just hit edit in controller');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        //
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'string|min:1|nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        $messages = [
            'name.unique' => 'Category name must be unique.',
        ]);

        $category = ProductCategory::findOrFail($category);

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
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = ProductCategory::findOrFail($id);
        $category->delete();
        return back()->with('toast_success', trans($category->name . ' Deleted Successfully'));
    }
}
