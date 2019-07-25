<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;
use Validator;
use Response;

class otpController extends Controller
{   
	protected function get(){   
    return view('otp');
	}

    protected function check(Request $request){
    $phone = session()->get('u'); 
    $u =  User::where('phone',$phone)->first(); 
    $otp = $u['otp'];

    $rules = array('otp' => 'required|integer|regex:/[0-9]{4}/'); 
    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
    return Response::json(array( 'errors' => $validator->getMessageBag()->toArray() )); 
    }  
    $data = $request->validate([
            'otp' => ['required' ],  
        ]);   
    if ($otp == $data['otp']){    
        Auth::login($u);
        return redirect('/');
    }
    else return Response::json(['errors'=>['otp'=>'Incorrect OTP']]); 
	}
	
}
