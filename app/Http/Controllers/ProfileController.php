<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Hash;


class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        // Task: fill in the code here to update name and email
        // Also, update the password if it is set
        $data = $request->validated();
        if (isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }
        auth()->user()->update($data);  
       
        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
