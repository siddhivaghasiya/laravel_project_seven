<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin::modules.index');
    }

    public function ajaxlisting(Request $request)
    {

        $sql = \App\Models\Modules::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })


            ->editColumn('name', function ($data) {
                return $data->name;
            })

            ->editColumn('status', function ($data) {

                if ($data->status == 1) {

                    return '<span class="btn btn-success btn-sm">'.trans('lang_data.active_lable').'</span>';
                } else {

                    return '<span class="btn btn-danger btn-sm">'.trans('lang_data.inactive_lable').'</span>';
                }
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('modules.edit',$data->id).'" class="btn btn-primary btn-sm">'.trans('lang_data.edit_lable').'</a> <a href="'.route('modules.show',$data->id).'" class="btn btn-danger btn-sm">'.trans('lang_data.delete_lable').' </a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'name', 'status', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::modules.addedit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',

        ]);

        $obj = new \App\Models\Modules;
        $obj->name = $request->name;
        $obj->status = $request->status;



        $obj->save();

        return redirect()->route('modules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $obj =  \App\Models\Modules::where('id', $id)->firstOrfail();


        $obj->delete();

        return redirect()->route('modules.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editdata = \App\Models\Modules::where('id',$id)->firstOrfail();

        return view('admin::modules.addedit',compact('editdata'));
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
        $request->validate([
            'name' => 'required',
            'status' => 'required',

        ]);

        $obj =  \App\Models\Modules::where('id', $id)->firstOrfail();
        $obj->name = $request->name;
        $obj->status = $request->status;


        $obj->save();

        return redirect()->route('modules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
