<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcriber;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;


class AdminSubcriberController extends Controller
{
    public function show(){

       $all_subcribers= Subcriber::where('status',1)->get();
       return view('admin.subcriber_show',compact('all_subcribers'));

    }

    public function send_email(){

        return view('admin.subcriber_send_email');
    }

    public function send_email_submit(Request $request){

        $request->validate([
            'subject'=>'required',
            'message'=>'required'
        
        ]);
       

          // Send email
    $subject=$request->subject;
    $message=$request->message;
    

    $all_subcribers=Subcriber::where('status',1)->get();
    foreach($all_subcribers as $item){

        Mail::to($item->email)->send(new Websitemail($subject,$message));
    }

    
    return redirect()->back()->with('success','Email sent successfully');
    
    }
}
