<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::all();
        return view('admin.links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text_ar' => 'required',
            'text_en' => 'required',
            'link' => 'required',
            'icon' => 'required',
        ]);

        $link = Link::create($request->all());

        if($request->has('icon')){
            //Make image name unique
            $full_file_name = $request->icon;
            $file_name = pathinfo($full_file_name, PATHINFO_FILENAME);
            $extension = $request->icon->getClientOriginalExtension();
            $file_name_to_store = $file_name.'_'.time().'.'.$extension;

            //Upload icon
            $path = $request->icon->move(public_path('/images/'), $file_name_to_store);
            $url = url('/images/'.$file_name_to_store);
            $link->update(['icon' => $url]);
        }

        if($link){
            session()->flash('success', trans('admin.created'));
            return redirect()->route('links.index');
        }
        else{
            session()->flash('erro', trans('admin.error'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = Link::find($id);
        return view('admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text_ar' => 'required',
            'text_en' => 'required',
            'link' => 'required',
        ]);

        $link = Link::find($id);
        $link->update($request->all());

        if($request->has('icon')){

            $file_name = pathinfo($link->icon, PATHINFO_FILENAME);
            $extension = substr($link->icon,strrpos($link->icon,'.'));
            $full_name = $file_name.$extension;
            $file_path = 'images/'.$full_name;
            if(\File::exists($file_path)){
                \File::delete($file_path);
            }

            //Make image name unique
            $full_file_name = $request->icon;
            $file_name = pathinfo($full_file_name, PATHINFO_FILENAME);
            $extension = $request->icon->getClientOriginalExtension();
            $file_name_to_store = $file_name.'_'.time().'.'.$extension;

            //Upload icon
            $path = $request->icon->move(public_path('/images/'), $file_name_to_store);
            $url = url('/images/'.$file_name_to_store);
            $link->update(['icon' => $url]);

        }

        if($link){
            session()->flash('success', trans('admin.updated'));
            return redirect()->route('links.index');
        }
        else{
            session()->flash('erro', trans('admin.error'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }

    public function deleteLink(Request $request){
        $link = Link::find($request->id);

        $file_name = pathinfo($link->icon, PATHINFO_FILENAME);
        $extension = substr($link->icon,strrpos($link->icon,'.'));
        $full_name = $file_name.$extension;
        $file_path = 'images/'.$full_name;
        if(\File::exists($file_path)){
            \File::delete($file_path);
        }

        $link->delete();
        return response()->json([
            'data' => 1
        ], 200);
    }
}

