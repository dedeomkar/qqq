<?php

namespace App\Http\Controllers;

use Response; 
use Validator;
use Illuminate\Support\Facades\Input;
use App\User; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use App\Notifications\otp;

class userController extends Controller
{	 
    protected function login( )
    {  

        $data = session()->get('saved');   
        return view('layouts.main', ['data'=>$data]);
    } 
	public function register(Request $request)
    {    
        $otp = rand(1000,9999); 
        $rules = array('name' => 'required|string|max:255',
                       'company' => 'required|string|max:255',
                       'phone' => 'required|integer|regex:/[0-9]{10}/');

        $validator = Validator::make(Input::all(), $rules);
 
        if ($validator->fails())
        {
        return Response::json(array( 'errors' => $validator->getMessageBag()->toArray() )); 
        }  
        $data = $request->validate([
                'name' => ['required','string', 'max:255'], 
                'company' => ['required','string', 'max:255'], 
                'phone' => ['required','integer','regex:/[0-9]{10}/'], 
            ]);    
        session()->put('saved',$data);
        $data['password'] = Hash::make('101') ;  
        $u = User::where('id',13)->first();  
        $u->name ='+91'.(string)$data['phone']; 
        $u->save(); 
        session()->put('u', $data['phone']); 

        $newuser = User::where('phone',$data['phone'])->first();
 
        if ($newuser){
        $newuser->name = $data['name'];
        $newuser->company = $data['company'];
        $newuser->otp = $otp;
        $data['otp']=$otp;              /*risk*/
        $newuser->save();
        }else {
            $data['otp']=  $otp;        /*risk*/
            User::create($data);
        } 

        try {$u->notify(new otp($otp)) ;}
        catch (\Exception $e){ 
            return "Awd";
        }   
    }  

    protected function logout(){ 
    Auth::logout();
    return redirect('/');
	} 
}