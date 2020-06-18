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
        $settings = Setting::find(1);
        $settings->update($request->all());
        
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

        if($request->has('icons') || $request->has('text_ar') || $request->has('text_en') || $request->has('links')){
            $this->validate($request, [
                'icons' => 'required',
                'text_ar' => 'required',
                'text_en' => 'required',
                'links' => 'required',
            ]);
            $icons = $request->icons;
            $links = $request->links;
            $text_ar = $request->text_ar;
            $text_en = $request->text_en;

            for($i = 0; $i < count($icons); $i++){
                $link = new Link();
                //Make image name unique
                $full_file_name = $icons[$i];
                $file_name = pathinfo($full_file_name, PATHINFO_FILENAME);
                $extension = $icons[$i]->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;

                //Upload icon
                $path = $icons[$i]->move(public_path('/images/'), $file_name_to_store);
                $url = url('/images/'.$file_name_to_store);
                $link->icon = $url;
                $link->text_ar = $text_ar[$i];
                $link->text_en = $text_en[$i];
                $link->link = $links[$i];
                $link->save();
            }
        }

        session()->flash('message', trans('admin.updated'));
        return redirect()->back();
    }

    public function deleteContact(Request $request){
        Contact::find($request->id)->delete();
    }

    public function deleteLink(Request $request){
        Link::find($request->id)->delete();
    }
}
