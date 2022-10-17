<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::cms.index');
    }

    public function ajaxlisting(Request $request)
    {
        $sql = \App\Models\Cms::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })


            ->editColumn('name', function ($data) {
                return $data->name;
            })

            ->editColumn('parent_title', function ($data) {

                $parent_title = \App\Models\cms::where('id', $data->parent_title)->first();

                if ($parent_title != null) {

                    return $parent_title->name;
                }else{
                    return "_";
                }
            })



            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/cms') . '/' . $data->image . '">';
            })

            ->editColumn('status', function ($data) {

                if ($data->status == 1) {

                    return '<span class="btn btn-success btn-sm">' . trans('lang_data.active_lable') . '</span>';
                } else {

                    return '<span class="btn btn-danger btn-sm">' . trans('lang_data.inactive_lable') . '</span>';
                }
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="' . route('cms.edit', $data->id) . '" class="btn btn-primary btn-sm">' . trans('lang_data.edit_lable') . '</a> <a href="' . route('cms.show', $data->id) . '" class="btn btn-danger btn-sm">' . trans('lang_data.delete_lable') . ' </a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'name', 'parent_title', 'image', 'status', 'action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $getparent_title = \App\Models\cms::pluck('name','id')->toarray();
        $getmodules = \App\Models\Modules::pluck('name','id')->toarray();

        return view('admin::cms.addedit',compact('getparent_title','getmodules'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'modules' => 'required',
                'name' => 'required',
                'secondary_title' => 'required',
                'display_on_header' => 'required',
                'display_on_footer' => 'required',
                'status' => 'required',
                'image' => 'required',
                'seo_title' => 'required',
                'seo_keyword' => 'required',
                'seo_description' => 'required',
                'short_description' => 'required',
                'long_description' => 'required',
            ],
            [
                'image.required' => 'please choose image',
            ]
        );

        $obj = new \App\Models\cms;
        $obj->parent_title = $request->parent_title;
        $obj->modules = $request->modules;
        $obj->name = $request->name;
        $obj->secondary_title = $request->secondary_title;
        $obj->display_on_header = $request->display_on_header;
        $obj->display_on_footer = $request->display_on_footer;
        $obj->status = $request->status;
        $obj->seo_title = $request->seo_title;
        $obj->seo_keyword = $request->seo_keyword;
        $obj->seo_description = $request->seo_description;
        $obj->short_description = $request->short_description;
        $obj->long_description = $request->long_description;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/categories/' . $be->intro_bg2);
            $filename = rand() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/cms/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return redirect()->route('cms.index');


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

        return redirect()->route('cms.index');

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $getparent_title = \App\Models\cms::pluck('name','id')->toarray();
        $getmodules = \App\Models\Modules::pluck('name','id')->toarray();
        $editdata = \App\Models\cms::where('id',$id)->firstOrfail();

        return view('admin::cms.addedit',compact('getparent_title','editdata','getmodules'));    }

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
                'modules' => 'required',
                'name' => 'required',
                'secondary_title' => 'required',
                'display_on_header' => 'required',
                'display_on_footer' => 'required',
                'status' => 'required',
                'image' => 'required',
                'seo_title' => 'required',
                'seo_keyword' => 'required',
                'seo_description' => 'required',
                'short_description' => 'required',
                'long_description' => 'required',
            ],
            [
                'image.required' => 'please choose image',
            ]
        );

        $obj =  \App\Models\cms::where('id',$id)->first();
        $obj->parent_title = $request->parent_title;
        $obj->modules = $request->modules;
        $obj->name = $request->name;
        $obj->secondary_title = $request->secondary_title;
        $obj->display_on_header = $request->display_on_header;
        $obj->display_on_footer = $request->display_on_footer;
        $obj->status = $request->status;
        $obj->seo_title = $request->seo_title;
        $obj->seo_keyword = $request->seo_keyword;
        $obj->seo_description = $request->seo_description;
        $obj->short_description = $request->short_description;
        $obj->long_description = $request->long_description;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/cms/' . $obj->image);
            $filename = rand() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/cms/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return redirect()->route('cms.index');
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
