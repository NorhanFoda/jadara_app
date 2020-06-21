<?php

namespace App\Classes;

class Notify{
    
    static function NotifyAll($tokenList, $request){

        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        
        $notification = [
            'body' => $request->msg_ar,
            'sound' => true,
        ];

        $extraNotificationData = ["message" => $notification,"moredata" =>'dd', 'type' => 'admin-message'];

        $fcmNotification = [
            'registration_ids' => $tokenList, //multple token array
            'notification' => $notification,
            'data' => $extraNotificationData,
        ];

        $headers = [
            'Authorization: key=AAAAiIXtGcM:APA91bEDMK99KpHzrrXbRxOQB-m0Yc8ofTit26DvMkKsyozK8H2J-_5JDQBdkPbd_RdZxmNgDJuhcf-utCp9J7K6hHiODwyZww9kfwW-ufdYEl-ub82WJDWytjwunuPeZYQVDlEWy0RK',
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
    }

    static function NotifyUser($user_tokens, $msg){

        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        
        $notification = [
            'body' => $msg,
            'sound' => true,
        ];

        $extraNotificationData = ["message" => $notification,"moredata" =>'dd', 'type' => 'admin-message'];

        if(count($user_tokens) > 0){
            foreach($user_tokens as $token){
                $fcmNotification = [
                    'to'        => $token->token, //single token
                    'notification' => $notification,
                    'data' => $extraNotificationData,
                ];
            }
        }

        $headers = [
            'Authorization: key=AAAAiIXtGcM:APA91bEDMK99KpHzrrXbRxOQB-m0Yc8ofTit26DvMkKsyozK8H2J-_5JDQBdkPbd_RdZxmNgDJuhcf-utCp9J7K6hHiODwyZww9kfwW-ufdYEl-ub82WJDWytjwunuPeZYQVDlEWy0RK',
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
    }
}