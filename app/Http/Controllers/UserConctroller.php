<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserConctroller extends Controller
{
    public function show()
    {
        return view('home/profile');
    }

    public function record()
    {

        $user = auth()->user();
        $records = $user->records;

        return view('home/record', compact('records'));
    }
}
