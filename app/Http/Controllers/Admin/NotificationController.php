<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\DeviceToken;
use App\Models\Notification;
use App\User;
use App\Classes\Notify;

class NotificationController extends Controller
{
    public function __construct()
    {
        // Auth::shouldUse('web');
    }

    public function index(){
        $all_data = Notification::orderBy('created_at', 'desc')->get(['id', 'msg_ar', 'msg_en', 'created_at']);
        $notifications = $all_data->unique('msg_ar'); 
        return view('admin.notifications.index', compact('notifications'));
    }

    public function create(){
        return view('admin.notifications.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'msg_ar' => 'required',
            'msg_en' => 'required',
        ]);
        
        $users = DeviceToken::get(['device_id']);

        //Make image name unique
        $full_file_name = $request->image;
        $file_name = pathinfo($full_file_name, PATHINFO_FILENAME);
        $extension = $request->image->getClientOriginalExtension();
        $file_name_to_store = $file_name.'_'.time().'.'.$extension;
        
        //Upload image
        $path = $request->image->move(public_path('/images/'), $file_name_to_store);
        $url = url('/images/'.$file_name_to_store);

        if(count($users) > 0){
            foreach($users as $user){
                $notifications = Notification::create([
                    'msg_ar' => $request->msg_ar,
                    'msg_en' => $request->msg_en,
                    'image' => $url,
                    'device_id' => $user->device_id,
                    'read' => 0
                ]);
            }
        }

        $notification = DeviceToken::pluck('token');

        Notify::NotifyAll($notification, $request);

        session()->flash('message', trans('admin.notification_created'));
        return redirect()->route('notifications.index');
    }

    public function delete(Request $request){
        if($request->ajax()){
            $nots = Notification::where('msg_ar', Notification::find($request->id)->msg_ar)->get();
            if(count($nots) > 0){
                foreach($nots as $not){
                    $not->delete();
                }
            }
            return response()->json([
                'data' => 1,
            ], 200);
        }
    }
}
