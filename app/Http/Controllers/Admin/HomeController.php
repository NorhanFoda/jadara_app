<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index(){
        $settings = Setting::find(1);
        $contacts = Contact::all();
        return view('admin.home.home', compact('settings', 'contacts'));
    }

    public function change_locale($locale){
        \LaravelLocalization::setLocale($locale);
	    $url = \LaravelLocalization::getLocalizedURL(\App::getLocale(), \URL::previous());
		return \Redirect::to($url);
    }

    public function update(Request $request){
        $settings = Setting::find(1);
        $settings->update($request->all());
        
        // dd($request->all());
        
        if($request->has('contact_locations_ar') || $request->has('contact_locations_en')){
            $contacts_ar = $request->contact_locations_ar;
            $contacts_en = $request->contact_locations_en;
            $phones_1 = $request->contact_phones_1;
            $phones_2 = $request->contact_phones_2;

            for($i = 0; $i < count($contacts_ar); $i++){
                if($contacts_ar[$i] != null){
                    $con = Contact::create([
                        'location_ar' => $contacts_ar[$i],
                        'location_en' => $contacts_en[$i],
                        'phone_1' => $phones_1[$i],
                        'phone_2' => $phones_2[$i],
                    ]);
                }
            }
        }

        session()->flash('message', trans('admin.updated'));
        return redirect()->back();
    }

    public function deleteContact(Request $request){
        Contact::find($request->id)->delete();
    }
}
