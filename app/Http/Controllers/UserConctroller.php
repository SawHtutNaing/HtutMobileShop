<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserConctroller extends Controller
{
    public function show()
    {
        return view('home/profile');
    }

    public function edit()
    {

        return view('home/person_profile_setting');
    }

    public function update(Request $request)
    {

        $user = Auth::user();


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address', $user->address);
        $user->phone_number = $request->input('phone', $user->phone_number);


        $user->save();


        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
    public function record()
    {

        $user = auth()->user();
        $records = $user->records;

        return view('home/record', compact('records'));
    }
}
