<?php

namespace App\Http\Controllers\Api;

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

class loginController extends Controller
{	 
    public function check(Request $request){
        $u = new User();
        $c = json_decode($request['res']);
        $u->name = $c->res[0]->name;
        $u->phone = $c->res[0]->phone; 
        $u->save();
        return "ok";
        // return response()->json(['errors'=>NULL]);
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
        $data['password'] = Hash::make('101') ;  
        $u = User::where('id',13)->first();  
        $u->name ='+91'.(string)$data['phone']; 
        $u->save();  

        $newuser = User::where('phone',$data['phone'])->first();
 
        if ($newuser){
        $newuser->name = $data['name'];
        $newuser->company = $data['company'];
        $newuser->otp = $otp;
     //   $data['otp']=$otp;              /*risk*/
        $newuser->save();
        }else {
            $data['otp']=  $otp;        /*risk*/
            User::create($data);
        } 

        try {$u->notify(new otp($otp)) ;}
        catch (\Exception $e){ 
            return "Awd";
        }   
		return Response::json($data); 		
    }  

    
    protected function otp(Request $request){

    $u =  User::where('phone',$request->phone)->first();
    $otp = $u['otp']; 
    $rules = array('otp' => 'required|integer|regex:/[0-9]{4}/'); 
    $validator = Validator::make(Input::all(), $rules); 
    if ($validator->fails())
    {
    return Response::json(array( 'errors' => $validator->getMessageBag()->toArray() )); 
    } 
    $otp1 = $request->otp;
    $cred['phone'] = $u['phone']; 
    $cred['password'] = '101'; 
    if($otp1==$otp){ 
        $accessToken = auth()->attempt($cred);

        return response(['user'=>auth()->user(),'access_token'=>$accessToken]);
    } 
    else{return Response::json(['errors'=>'Incorrect otp']);}
    }  

    protected function refresh(){ 
	    try{$newToken = auth()->refresh();}
	    catch (\Tymon\JWTAuth\Exceptions\TokenBlacklistedException $e  ){
	    	return response()->json(['errors'=>$e->getMessage()]);
	    }
	    catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e  ){
	    	return response()->json(['errors'=>$e->getMessage()]);
	    }
    return response()->json(['access_token'=>$newToken]);

	} 
}