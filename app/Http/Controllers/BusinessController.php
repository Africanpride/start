<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Business::all()->count() > 0) {
        //     $this->update();
        // }

        // $media = '';
        // $business = Business::where('slug', $slug)->first();
        // if (!$business->getFirstMedia('featured') == null) {
        //     $media = $business->getFirstMedia('featured')->geturl();
        // }

        // $business = Business::where('main', 'first')->first();

        // dd($business->getFirstMediaUrl('logo'));
        // $userCount = User::count();
        // dd(rand(1,$userCount));
        // dd(User::count());

        return view('seo');
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

        // dd($request->image());
        // check if record exists.
        $business = Business::where('main', 'first')->first();

        // if no such record exists, create one. else update the record
        if (!$business)
        {
            // Data does not exists. Create it and add the 'main' attribute.
            $business = Business::Create($request->except(['_token', '_method' ]) + ['main' => 'first']);
            if ($request->hasfile('image'))  {
                $business->addMediaFromRequest('image')->toMediaCollection('logo');
            }
        } else {

        // Data exist. Find it and update it with incoming record.
        $business_record = Business::where('main', 'first')->first();
        $business_record->Update($request->except(['_token', '_method' ]));
        if ($request->hasfile('image'))  {
            $business_record->addMediaFromRequest('image')->toMediaCollection('logo');
        }

        }

        return redirect()->back()->with('toast_success', 'Business/Company Record Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        //

        // dd($business->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        //
    }
}
