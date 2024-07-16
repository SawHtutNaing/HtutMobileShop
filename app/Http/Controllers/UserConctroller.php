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

        return redirect()->route('profile');
    }
    public function record()
    {

        $user = auth()->user();
        $records = $user->records;

        return view('home/record', compact('records'));
    }
}
