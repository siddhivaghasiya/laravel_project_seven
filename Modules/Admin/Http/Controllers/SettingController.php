<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $editdata = \App\Models\Setting::first();

        return view('admin::setting.edit',compact('editdata'));
     }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $obj = \App\Models\cms::where('id',$id)->firstOrfail();
        @unlink('uploads/cms/' . $obj->image);

        $obj->delete();

        return redirect()->route('setting.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'website_url' => 'required',
                'author_name' => 'required',
                'email' => 'required',
                'second_email' => 'required',
                'mobile' => 'required',
                'second_mobile' => 'required',
                'author_desciption_footer' => 'required',
                'author_desciption_sidebar' => 'required',
                'second_address' => 'required',
                'address' => 'required',

            ],
            [
                'image.required' => 'please choose image',
            ]
        );

        $obj =  \App\Models\Setting::first();
        $obj->website_url = $request->website_url;
        $obj->author_name = $request->author_name;
        $obj->email = $request->email;
        $obj->second_email = $request->second_email;
        $obj->mobile = $request->mobile;
        $obj->second_mobile = $request->second_mobile;
        $obj->author_desciption_footer = $request->author_desciption_footer;
        $obj->author_desciption_sidebar = $request->author_desciption_sidebar;
        $obj->second_address = $request->second_address;
        $obj->address = $request->address;
        // $obj->logo = $request->logo;
        // $obj->favicon_logo = $request->favicon_logo;
        // $obj->email_logo = $request->email_logo;
        // $obj->default_banner = $request->default_banner;
        // $obj->author_image = $request->author_image;

        $img = $request->file('logo');

        if ($request->hasFile('logo')) {

            @unlink('uploads/setting/' . $obj->logo);
            $filename = rand() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/setting/', $filename);

            $obj->logo = $filename;
        }

        $img2 = $request->file('favicon_logo');

        if ($request->hasFile('favicon_logo')) {

            @unlink('uploads/setting/' . $obj->favicon_logo);
            $filename = rand() . '.' . $img2->getClientOriginalExtension();
            $img2->move('uploads/setting/', $filename);

            $obj->favicon_logo = $filename;
        }

        $img3 = $request->file('email_logo');

        if ($request->hasFile('email_logo')) {

            @unlink('uploads/setting/' . $obj->email_logo);
            $filename = rand() . '.' . $img3->getClientOriginalExtension();
            $img3->move('uploads/setting/', $filename);

            $obj->email_logo = $filename;
        }

        $img4 = $request->file('default_banner');

        if ($request->hasFile('default_banner')) {

            @unlink('uploads/setting/' . $obj->default_banner);
            $filename = rand() . '.' . $img4->getClientOriginalExtension();
            $img4->move('uploads/setting/', $filename);

            $obj->default_banner = $filename;
        }

        $img5 = $request->file('author_image');

        if ($request->hasFile('author_image')) {
            // dd('uploads/setting/'.$obj->author_image);
            @unlink('uploads/setting/'.$obj->author_image);
            $filename = rand() . '.' . $img5->getClientOriginalExtension();
            $img5->move('uploads/setting/', $filename);

            $obj->author_image = $filename;
        }

        $obj->save();

        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */

    public function delete_authorimage(){

        $obj = \App\Models\Setting::first();

        @unlink('uploads/setting/'.$obj->author_image);

            $obj->author_image = null;


        $obj->save();

        return response()->json(['status'=>'ok']);

    }
    public function delete_defaultbanner(){

        $obj = \App\Models\Setting::first();

        @unlink('uploads/setting/'.$obj->default_banner);

            $obj->default_banner = null;


        $obj->save();

        return response()->json(['status'=>'ok']);

    }

    public function delete_emaillogo(){

        $obj = \App\Models\Setting::first();

        @unlink('uploads/setting/'.$obj->email_logo);

            $obj->email_logo = null;


        $obj->save();

        return response()->json(['status'=>'ok']);

    }

    public function delete_faviconlogo(){

        $obj = \App\Models\Setting::first();

        @unlink('uploads/setting/'.$obj->favicon_logo);

            $obj->favicon_logo = null;


        $obj->save();

        return response()->json(['status'=>'ok']);

    }

    public function delete_logo(){

        $obj = \App\Models\Setting::first();

        @unlink('uploads/setting/'.$obj->logo);

            $obj->logo = null;


        $obj->save();

        return response()->json(['status'=>'ok']);

    }
}
