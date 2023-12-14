<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\Subcriber;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubcriberController extends Controller
{
    public function send_email(Request $request){

        $validator = Validator::make($request->all(),[
           
            'email' => 'required|email',
       
        ]);

        if(!$validator->passes())
{
    return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
}
else
{    

    $token=hash('sha256', time());

     $obj=new Subcriber();
     $obj->email = $request->email;
     $obj->token = $token;
     $obj->status=0;
     $obj->save();

     $verification_link= url('subcriber/verify/'.$request->email.'/'.$token);

    // Send email
    $subject='Subcriber Verification';
    $message='Visitor email information: <br>';
    $message .='<a href="'.$verification_link.'">';
    $message .= $verification_link;
    $message .= '</a>';



    Mail::to($request->email)->send(new Websitemail($subject,$message));

    return response()->json(['code'=>1,'success_message'=>'Please check your email to confirm subscription']);
}   
    }

    public function verify($email,$token){

         $subcriber_data= Subcriber::where('email',$email)->where('token',$token)->first();

         if($subcriber_data){

           $subcriber_data->token='';
           $subcriber_data->status=1;
           $subcriber_data->update();

           return redirect()->route('dash')->with('success','Subscription verified successfully');

         }

         else{

            return redirect()->route('dash');
         }
    }
}
