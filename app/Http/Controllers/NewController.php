<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waitlist;
use Illuminate\Support\Facades\Mail;

class NewController extends Controller
{
    //
    public function showWaitlist(){
        return view('waitlist.show');
    }
    
    public function addWaitlist(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',           
        ]);
        $waitlist = Waitlist::create($request->all());
        //$waitlist['body'] = 'Welcome to mailing list';
        //dd($waitlist['name']);
        $to_name = $waitlist['name'];
        $to_mail = $waitlist['email'];
        $data = array(
            'name'=>'Africa Alliance',
            'body'=>'Thank you for subscribing to our mailing list'

        );
        if($waitlist)
        {
            if($this->isOnline()){
                $email_data = [
                    'recipient' => $waitlist['email'],
                    'fromEmail' => $waitlist['email'],
                    'fromName' => 'Africad Alliance',
                    'subject' => 'Africad Alliance',
                    'body' => 'Thank you for signing up to our waiting list, we will get back to you soon.'
                ];
                \Mail::send('emails.mail-template', $email_data, function($message) use ($email_data){
                    $message->to($email_data['recipient'])
                            ->from($email_data['fromEmail'], $email_data['fromName'])
                            ->subject($email_data['subject']);
                });
                return redirect()->back()->with('success', 'Email Sent!');
            }else{
                return "No connection";
            }
            // Mail::send('emails.welcome',$data, $waitlist);
            // return ('create successfully');
        }else{
            return ('unable to register');
        }
    }

    public function isOnline($site = "https://www.google.com/")
    {
        if(@fopen($site, "r"))
        {
            return true;
        }else{
            return false;
        }
    }

    public function viewWaitlist()
    {
        $waitlists = Waitlist::all();
        return view('waitlist.viewWaitlist', compact('waitlists'));
        // dd($waitlists);
        // return $waitlists;
    }
}
