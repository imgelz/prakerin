<?php

namespace App\Http\Controllers;

use App\LogActivity;
use Illuminate\Http\Request;
use DataTables;
use Session;

class LogActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = LogActivity::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', function($row){
                        $btn = '<button type="button" class="hapus-logActivity-per-id btn btn-danger btn-sm" data-id="'.$row->id.'" data-subject="'.$row->subject.'" data-url="'.$row->url.'" data-method="'.$row->method.'" data-ip="'.$row->ip.'" data-agent="'.$row->agent.'" data-user="'.$row->user_name.'" data-toggle="modal" data-target="#modal-hapus-log"><i class="fa fa-trash-o"></i></button>';
                        return $btn;
                    })
                    ->rawColumns(['aksi'])
                    ->make(true);
        }
        return view('backend.LogActivity.index');

        // $logs = \LogActivity::logActivityLists();
        // return view('backend.LogActivity.index',compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogActivity  $logActivity
     * @return \Illuminate\Http\Response
     */
    public function show(LogActivity $logActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LogActivity  $logActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(LogActivity $logActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LogActivity  $logActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogActivity $logActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LogActivity  $logActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logActivity = LogActivity::findOrFail($id);
        if(!LogActivity::destroy($id)){
        return redirect()->back();
        }
        Session::flash("flash_notification", ["level"=>"danger",
                        "message"=>"Berhasil Menghapus Log Activity"]);
        return redirect()->route('logActivity.index');
    }
}
