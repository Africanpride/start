<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Ramsey\Uuid\Uuid;
use App\Models\Profile;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    use Uuids;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function photos(Request $request, $uuid) {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $profile = Profile::findOrFail($uuid); // Get the profile we are dealing with
        dd($profile);
        if ($request->hasFile('avatar')) {
            Storage::delete('backend/assets/img/avatar/' . $profile->avatar); // Delete profile image on disk. We want to save space
            // $originalName = $request->avatar->getClientOriginalName();
            $path = Storage::putFile('avatar', new File('/backend/assets/img/avatar'));
            // $filename = $request->avatar->storeAs('/uploads/images', $originalName, 'public');
            $profile->update(['avatar' => $path]);
        }

        return redirect()->back()->with(['status' => 'Profile updated successfully.']);

    }


    public function index()
    {
        //
        return view('profiles.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {

        $profile = Profile::uuid($uuid);
        return view('profile.show', compact('profile'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
