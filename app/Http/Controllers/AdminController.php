<?php

namespace App\Http\Controllers;

use App\Mail\joinedWaitlist;
use App\Models\Waitlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'email' => 'required',           
        ]);
        $waitlist = Waitlist::create($request->all());
        $email = $waitlist['email'];
        if($waitlist)
        {
            //$waitlist->Mail::send(new joinedWaitlist());
            //Mail::to($email)->send(new joinedWaitlist($email));
            return response()->json(['message'=>'waitlist added successfully', 'user' => $waitlist]);
        }else{
            return ["message" => "Operation failed"]; 
        }
    }
}
