<?php

namespace App\Http\Controllers;

use App\Models\Waitlist;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function welcome()
    {
        return response()->json(['message'=>'welcome to waitlist']);
    }

    public function createWaitlist(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',           
        ]);
        $waitlist = Waitlist::create($request->all());
        if($waitlist)
        {
            return response()->json(['message'=>'waitlist added successfully', 'user' => $waitlist]);
        }else{
            return ["message" => "Operatrion failed"]; 
        }
    }
}
