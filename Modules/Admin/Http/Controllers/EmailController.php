<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::email.index');
    }

    public function ajaxlisting(Request $request)
    {
        $sql = \App\Models\Email::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })


            ->editColumn('title', function ($data) {
                return $data->title;
            })

            ->editColumn('from', function ($data) {
                return $data->from;
            })

            ->editColumn('subject', function ($data) {
                return $data->subject;
            })

            ->editColumn('status', function ($data) {

                if ($data->status == 1) {

                    return '<span class="btn btn-success btn-sm">' . trans('lang_data.active_lable') . '</span>';
                } else {

                    return '<span class="btn btn-danger btn-sm">' . trans('lang_data.inactive_lable') . '</span>';
                }
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="' . route('email.edit', $data->id) . '" class="btn btn-primary btn-sm">' . trans('lang_data.edit_lable') . '</a> <a href="' . route('email.show', $data->id) . '" class="btn btn-danger btn-sm">' . trans('lang_data.delete_lable') . ' </a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'title', 'from', 'subject', 'status', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::email.addedit');
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
                'from' => 'required',
                'subject' => 'required',
                'status' => 'required',
            ]);

        $obj = new \App\Models\Email;
        $obj->title = $request->title;
        $obj->from = $request->from;
        $obj->subject = $request->subject;
        $obj->status = $request->status;

        $obj->save();

        return redirect()->route('email.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $obj = \App\Models\Email::where('id',$id)->firstOrfail();

        $obj->delete();

        return redirect()->route('email.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $editdata = \App\Models\Email::where('id',$id)->firstOrfail();

        return view('admin::email.addedit',compact('editdata'));
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
                'from' => 'required',
                'subject' => 'required',
                'status' => 'required',
            ]);

        $obj =  \App\Models\Email::where('id',$id)->first();
        $obj->title = $request->title;
        $obj->from = $request->from;
        $obj->subject = $request->subject;
        $obj->status = $request->status;

        $obj->save();

        return redirect()->route('email.index');
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
