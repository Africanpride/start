<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

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
        // dd($request->all());
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
        // $slug           =   Str::slug($request->title);
        $description    =   $request->description;
        $comment        =   $request->comment;
        $file           =   $request->file('image');

        // Ok. Validated. everything is solid.
        $service =  Service::create([
            'name'          =>  $name,
            'slug'          =>  Str::slug($request->name),
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
    public function show($id)
    {
        //
        $service = Service::find($id);
        $service2json = $service->toJson();
        return view('services.show', compact('service', 'service2json'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $service =  Service::find($id);
        $categories = ServiceCategory::pluck('name', 'id')->toArray();
        // $categories = collect($categories_list);
        return view('services.edit', compact('service', 'categories'));

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
        $service->update($request->all());
        $service->categories()->sync($request->input('categories'));
        return redirect()->back()->with('toast_success', trans($service->name . ' Updated Successfully'));

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
