<?php

namespace App\Http\Controllers;

use Category;
use Exception;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $products = Product::all();
        $categories = ProductCategory::all();
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Product $product)
    {
        //
        $products = Product::all();
        $categories = ProductCategory::all();
        return view('products.create', compact('product', 'categories'));
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
            'name' => 'required|unique:products|max:255',
            'description' => 'string|min:1|nullable|',
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:2048|nullable',
        ]);
        // dd($request->all());
        $name     =  $request->name;
        $description   =  $request->description;
        $file = $request->file('image');

        // Ok. Validated. everything is solid.
        $product = Product::create([
            'user_id'       =>  Auth::user()->id,
            'name'          =>  $name,
            'slug'          =>  Str::slug($name),
            'description'   =>  $description,
            ]);

        if ($request->hasfile('image'))  {
            $product->addMediaFromRequest('image')->toMediaCollection('featured');
        }
        return redirect()->route('products.index')->with('toast_success', trans($product->name . ' Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        // $product = Product::find($product)->first();
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        // Get the product via it's slug
        $product = Product::where('slug', $slug)->first();
        $name = $product->name;

        // Delete the product finally
        try {

            $product->delete();

            return redirect()->route('products.index', $product->slug)->with('toast_success','<b> <i>' . $name .  '</i></b>' .  ' is deleted successfully ');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('products.unexpected_error')]);
        }

    }
}
