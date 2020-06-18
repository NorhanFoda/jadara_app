<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Link;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginMail;

class HomeController extends Controller
{
    public function getWebsiteLink(){
        $website = Setting::find(1)->website;
        return response()->json([
            'data' => $website
        ], 200);
    }

    public function getServicesLink(){
        $services = Setting::find(1)->services;
        return response()->json([
            'data' => $services
        ], 200);
    }

    public function getClientsAreaLink(){
        $clients_area = Setting::find(1)->clients_area;
        return response()->json([
            'data' => $clients_area
        ], 200);
    }

    public function getContacts(){
        $contacts = Contact::get(['location_ar', 'location_en', 'phone_1', 'phone_2']);
        $setting = Setting::find(1);
        return response()->json([
            'contacts' => $contacts,
            'whatsapp_contact' => $setting->whatsapp,
            'direct_chat' => $setting->chat,
            'visit_request' => $setting->visit,
            'online_meeting' => $setting->meeting,
            'ticket' => $setting->ticket,
            'contact_request' => $setting->contact,
        ], 200);
    }

    public function loginUser(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ]);

        $email = Setting::find(1)->email;
        Mail::to($email)->send(new LoginMail($request->name, $request->phone));
        
        return response()->json([
            'status_en' => 'Email sent successfuly',
            'status_ar' => 'تم إرسال بياناتك بجاح',
        ], 200);
    }

    public function getAdditionalLinks(){
        $links = Link::get(['icon', 'text_ar', 'text_en', 'link']);
        return response()->json([
            'additional_links' => $links
        ]);
    }
}
