<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::banner.index');
    }

    public function ajaxlisting(Request $request)
    {
        $sql = \App\Models\Banner::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })


            ->editColumn('name', function ($data) {
                return $data->name;
            })


            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/banner') . '/' . $data->image . '">';
            })

            ->editColumn('status', function ($data) {

                if ($data->status == 1) {

                    return '<span class="btn btn-success btn-sm">' . trans('lang_data.active_lable') . '</span>';
                } else {

                    return '<span class="btn btn-danger btn-sm">' . trans('lang_data.inactive_lable') . '</span>';
                }
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="' . route('banner.edit', $data->id) . '" class="btn btn-primary btn-sm">' . trans('lang_data.edit_lable') . '</a> <a href="' . route('banner.show', $data->id) . '" class="btn btn-danger btn-sm">' . trans('lang_data.delete_lable') . ' </a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'name', 'image', 'status', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::banner.addedit');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required',
         ],
         [
            'image.required' => 'please select the image'
         ]);

         $obj = new \App\Models\Banner;
         $obj->name = $request->name;
         $obj->status = $request->status;

         $img = $request->file('image');

         if ($request->hasFile('image')) {

             // @unlink('uploads/categories/' . $be->intro_bg2);
             $filename = rand() .'.'. $img->getClientOriginalExtension();
             $img->move('uploads/banner/', $filename);

             $obj->image = $filename;


         }

         $obj->save();

         return redirect()->route('banner.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $obj = \App\Models\Banner::where('id',$id)->first();
        @unlink('uploads/banner/' . $obj->image);

        $obj->delete();

        return redirect()->route('banner.index');
  }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $editdata = \App\Models\Banner::where('id',$id)->firstOrfail();

        return view('admin::banner.addedit',compact('editdata'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required',
         ],
         [
            'image.required' => 'please select the image'
         ]);

         $obj =  \App\Models\Banner::where('id',$id)->first();
         $obj->name = $request->name;
         $obj->status = $request->status;

         $img = $request->file('image');

         if ($request->hasFile('image')) {

             @unlink('uploads/banner/' . $obj->image);
             $filename = rand() .'.'. $img->getClientOriginalExtension();
             $img->move('uploads/banner/', $filename);

             $obj->image = $filename;


         }

         $obj->save();

         return redirect()->route('banner.index');
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
}
