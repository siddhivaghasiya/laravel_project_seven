<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::blog.index');
    }
    public function ajaxlisting(Request $request)
    {
        $sql = \App\Models\Blog::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })


            ->editColumn('title', function ($data) {
                return $data->title;
            })

            ->editColumn('categories', function ($data) {

                $getcategories = \App\Models\Categories::where('id', $data->categories)->first();

                if ($getcategories != null) {

                    return $getcategories->name;
                }else{
                    return "_";
                }
            })

            ->editColumn('tags', function ($data) {

                $gettags = \App\Models\Tags::where('id', $data->tags)->first();

                if ($gettags != null) {

                    return $gettags->name;
                }
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/blog') . '/' . $data->image . '">';
            })

            ->editColumn('status', function ($data) {

                if ($data->status == 1) {

                    return '<span class="btn btn-success btn-sm">' . trans('lang_data.active_lable') . '</span>';
                } else {

                    return '<span class="btn btn-danger btn-sm">' . trans('lang_data.inactive_lable') . '</span>';
                }
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="' . route('blog.edit', $data->id) . '" class="btn btn-primary btn-sm">' . trans('lang_data.edit_lable') . '</a> <a href="' . route('blog.show', $data->id) . '" class="btn btn-danger btn-sm">' . trans('lang_data.delete_lable') . ' </a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'title', 'categories', 'tags', 'image', 'status', 'action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $gettags = \App\Models\Tags::pluck('name', 'id')->toarray();
        $getcategories = \App\Models\Categories::pluck('name', 'id')->toarray();

        return view('admin::blog.addedit', compact('gettags', 'getcategories'));
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
                'categories' => 'required',
                'tags' => 'required',
                'image' => 'required',
                'status' => 'required',
            ],
            [
                'image.required' => 'please choose image',
            ]
        );

        $obj = new \App\Models\Blog;
        $obj->title = $request->title;
        $obj->categories = $request->categories;
        $obj->tags = $request->tags;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/categories/' . $be->intro_bg2);
            $filename = rand() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/blog/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return redirect()->route('blog.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $editdata = \App\Models\Blog::where('id', $id)->firstOrfail();
        $editdata->delete();
        return redirect()->route('blog.index');

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $editdata = \App\Models\Blog::where('id', $id)->firstOrfail();

        $gettags = \App\Models\Tags::pluck('name', 'id')->toarray();
        $getcategories = \App\Models\Categories::pluck('name', 'id')->toarray();

        return view('admin::blog.addedit', compact('gettags', 'getcategories', 'editdata'));
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
                'categories' => 'required',
                'tags' => 'required',
                'image' => 'required',
                'status' => 'required',
            ],
            [
                'image.required' => 'please choose image',
            ]
        );

        $obj =  \App\Models\Blog::where('id', $id)->first();
        $obj->title = $request->title;
        $obj->categories = $request->categories;
        $obj->tags = $request->tags;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/blog/' . $obj->image);
            $filename = rand() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/blog/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return redirect()->route('blog.index');
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
