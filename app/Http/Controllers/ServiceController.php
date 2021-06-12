<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = ServiceCategory::all();
        $services = Service::all();
        return view('services.index', compact('services', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $categories = ServiceCategory::all();
        return view('services.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->input('categories'));
        // validate
        $request->validate([
            'name' => 'required|unique:services|max:255',
            'description' => 'string|min:1|nullable',
            'comment' => 'string|min:1|max:1000|nullable',
            'featured' => 'mimes:jpg,png,jpeg,gif,svg|max:2048|nullable',

        ]);

        $categoryIds    =   $request->categories;
        $name           =   $request->name;
        $slug           =   Str::slug($request->title);
        $description    =   $request->description;
        $comment        =   $request->comment;
        $file           =   $request->file('image');
        // dd($user_id);

        // Ok. Validated. everything is solid.
        $service =  Service::create([
            'name'          =>  $name,
            'slug'          =>  $slug,
            'description'   =>  $description,
            'comment'       =>  $comment,
            'user_id'       =>  Auth::user()->id
            ]);

        $service->categories()->attach($categoryIds);

        if ($request->hasfile('image'))  {
            $service->addMediaFromRequest('image')->toMediaCollection('featured');
        }

        return redirect()->route('services.create')->with('toast_success', trans($service->name . ' Created Successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        return view('services.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('services.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
