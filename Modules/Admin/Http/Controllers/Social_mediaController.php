<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

class Social_mediaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::social_media.index');
    }
    public function ajaxlisting(Request $request)
    {
        $sql = \App\Models\Social_media::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })


            ->editColumn('title', function ($data) {
                return $data->title;
            })

            ->editColumn('link', function ($data) {
                return $data->link;
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/social_media') . '/' . $data->image . '">';
            })

            ->editColumn('status', function ($data) {

                if ($data->status == 1) {

                    return '<span class="btn btn-success btn-sm">' . trans('lang_data.active_lable') . '</span>';
                } else {

                    return '<span class="btn btn-danger btn-sm">' . trans('lang_data.inactive_lable') . '</span>';
                }
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="' . route('social_media.edit', $data->id) . '" class="btn btn-primary btn-sm">' . trans('lang_data.edit_lable') . '</a> <a href="' . route('social_media.show', $data->id) . '" class="btn btn-danger btn-sm">' . trans('lang_data.delete_lable') . ' </a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'title', 'link', 'image', 'status', 'action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::social_media.addedit');
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
                'title' => 'required',
                'link' => 'required',
                'image' => 'required',
                'status' => 'required',
            ],
            [
                'image.required' => 'please choose image',
            ]
        );

        $obj = new \App\Models\Social_media;
        $obj->title = $request->title;
        $obj->link = $request->link;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/categories/' . $be->intro_bg2);
            $filename = rand() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/social_media/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return redirect()->route('social_media.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $obj = \App\Models\Social_media::where('id', $id)->firstOrfail();
        @unlink('uploads/social_media/' . $obj->image);

        $obj->delete();

        return redirect()->route('social_media.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $editdata = \App\Models\Social_media::where('id', $id)->firstOrfail();

        return view('admin::social_media.addedit',compact('editdata'));
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
                'title' => 'required',
                'link' => 'required',
                'image' => 'required',
                'status' => 'required',
            ],
            [
                'image.required' => 'please choose image',
            ]
        );

        $obj =  \App\Models\Social_media::where('id', $id)->first();
        $obj->title = $request->title;
        $obj->link = $request->link;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/social_media/' . $obj->image);
            $filename = rand() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/social_media/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return redirect()->route('social_media.index');
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
