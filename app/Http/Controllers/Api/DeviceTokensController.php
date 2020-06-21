<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\DeviceToken;

class DeviceTokensController extends Controller
{
    public function index(){
        return response()->json([
            'tokens' => DeviceToken::all()
        ]) ;
        
    }

    public function create(Request $request){
        // if(app('request')->header('Authorization') != null && Auth::guard('api')->check()){
            $this->validate($request, [
                'device_id' => 'required',
                'device_type' => 'required',
                'token' => 'required'
            ]);
        
            // $user = Auth::guard('api')->user();

            $token;

            $deivce_token = DeviceToken::where('device_id', $request->device_id)->first();

            if($deivce_token !=  null){
                $token = $deivce_token->update([
                    'token' => $request->token,
                    'device_type' => $request->device_type,
                ]);   
            }
            else{
                $token = DeviceToken::create([
                    'device_id' => $request->device_id,
                    'token' => $request->token,
                    'device_type' => $request->device_type,
                ]);
            }

            if($token){
                return response()->json([
                    'data' => $token
                ], 200);
            }
            else{
                return response()->json([
                    'error' => 'Creation failed'
                ], 400);
            }
        // }
        // else{
        //     return response()->json(['error' => 'Unauthorized'], 401);    
        // }
    }
}
