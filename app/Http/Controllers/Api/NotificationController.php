<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Resources\Notifications\NotificationsResource;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function enableDisableNotification(Request $request){
        // if(app('request')->header('Authorization') != null && Auth::guard('api')->check()){
            $this->validate($request, ['enable' => 'required']);
            Auth::guard('api')->user()->update(['allow_notification' => $request->enable]);
            if($request->enable == 1){
                return response()->json([
                    'success' => 'Notification enabled successfuly'
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'Notification disabled successfuly'
                ], 200);
            }
        // }
        // else{
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
    }

    public function getNotificationsCount(Request $request){
        // $user = Auth::guard('api')->user();
        $this->validate($request,['device_id'=>'required']);
        $notifications = Notification::where('device_id', $request->device_id)->where('read', 0)->get();
        return response()->json([
            'data' => count($notifications)
        ], 200);
    }

    public function getUserNotifications(Request $request){
        // $user = Auth::guard('api')->user();
        $this->validate($request,['device_id'=>'required']);
        $notifications = Notification::where('device_id', $request->device_id)->get();
        return response()->json([
            'data' => $notifications
        ], 200);
    }
}
