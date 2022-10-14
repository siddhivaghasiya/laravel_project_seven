<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

class Contact_usController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::contact_us.index');
    }


    public function ajaxlisting(Request $request)
    {

        $sql = \App\Models\Contact_us::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })


            ->editColumn('name', function ($data) {
                return $data->name;
            })

            ->editColumn('email', function ($data) {
                return $data->email;
            })
            ->editColumn('message', function ($data) {
                return $data->message;
            })


            ->addColumn('action', function ($data) {

                $string = '<a href="' . route('contact_us.edit', $data->id) . '" class="btn btn-success btn-sm">' . trans('lang_data.view_lable') . '</a> <a href="' . route('contact_us.show', $data->id) . '" class="btn btn-danger btn-sm">' . trans('lang_data.delete_lable') . ' </a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'name', 'email', 'message', 'status', 'action'])
            ->make(true);
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
        $obj = \App\Models\Contact_us::where('id', $id)->first();

        $obj->delete();

        return redirect()->route('contact_us.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $editdata = \App\Models\Contact_us::where('id', $id)->firstOrfail();

        return view('admin::contact_us.view', compact('editdata'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
