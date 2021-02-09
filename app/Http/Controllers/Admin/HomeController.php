<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Link;

class HomeController extends Controller
{
    public function index(){
        $settings = Setting::find(1);
        $contacts = Contact::all();
        $links = Link::all();
        return view('admin.home.home', compact('settings', 'contacts', 'links'));
    }

    public function change_locale($locale){
        \LaravelLocalization::setLocale($locale);
	    $url = \LaravelLocalization::getLocalizedURL(\App::getLocale(), \URL::previous());
		return \Redirect::to($url);
    }

    public function update(Request $request){
        $this->validate($request, [

            'contact_locations_ar' => 'nullable',
            'contact_locations_en' => 'nullable',
            'contact_phones_1' => 'nullable',
            'contact_phones_2' => 'nullable',
            'contact_phones_3' => 'nullable',
            'flags' => 'nullable|array',
            'flags.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_title' => 'required',
            'contact_subtitle' => 'required',
            'contact_description' => 'required',
            'contact_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $settings = Setting::find(1);
        $settings->update($request->all());

        if($request->has('contact_image')){
            //Make image name unique
            $full_file_name = $request->contact_image;
            $file_name = pathinfo($full_file_name, PATHINFO_FILENAME);
            $extension = $request->contact_image->getClientOriginalExtension();
            $file_name_to_store = $file_name.'_'.time().'.'.$extension;

            //Upload icon
            $path = $request->contact_image->move(public_path('/images/'), $file_name_to_store);
            $url = url('/images/'.$file_name_to_store);
            $settings->update(['contact_image' => $url]);
        }
        
        if($request->has('contact_locations_ar') || $request->has('contact_locations_en')){
            $contacts_ar = $request->contact_locations_ar;
            $contacts_en = $request->contact_locations_en;
            $phones_1 = $request->contact_phones_1;
            $whatsapp_ar = $request->contact_phones_2;
            $whatsapp_en = $request->contact_phones_3;
            $flags = $request->flags;

            for($i = 0; $i < count($contacts_ar); $i++){
                if($contacts_ar[$i] != null){
                    $con = Contact::create([
                        'location_ar' => $contacts_ar[$i],
                        'location_en' => $contacts_en[$i],
                        'phone' => $phones_1[$i],
                        'whatsapp_ar' => $whatsapp_ar[$i],
                        'whatsapp_en' => $whatsapp_en[$i],
                    ]);

                    //Make image name unique
                    $full_file_name = $flags[$i];
                    $file_name = pathinfo($full_file_name, PATHINFO_FILENAME);
                    $extension = $flags[$i]->getClientOriginalExtension();
                    $file_name_to_store = $file_name.'_'.time().'.'.$extension;
        
                    //Upload icon
                    $path = $flags[$i]->move(public_path('/images/'), $file_name_to_store);
                    $url = url('/images/'.$file_name_to_store);
                    $con->update(['flag' => $url]);
                }
            }
        }

        session()->flash('success', trans('admin.updated'));
        return redirect()->back();
    }

    public function deleteContact(Request $request){

        $con = Contact::find($request->id);

        $file_name = pathinfo($con->flag, PATHINFO_FILENAME);
        $extension = substr($con->flag,strrpos($con->flag,'.'));
        $full_name = $file_name.$extension;
        $file_path = 'images/'.$full_name;
        if(\File::exists($file_path)){
            \File::delete($file_path);
        }

        $con->delete();

        return response()->json([
            'data' => 1
        ], 200);
    }
}
