<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Session;
use DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kategori::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', function($row){
                           $btn = '<a href="/admin/kategori/" class="btn btn-primary fa fa-edit"></a>';
                           $btn = $btn.' <button type="submit" class="hapus-kategori-per-id btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-kategori" data-id="'.$row->id.'" data-nama="'.$row->nama_kategori.'" data-slug="'.$row->slug.'"><i class="fa fa-trash-o"></i></button>';
                            return $btn;
                    })
                    ->rawColumns(['aksi'])
                    ->make(true);
        }
        return view('backend.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('backend.kategori.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \LogActivity::addToLog('Tambah Data Kategori');

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori);
        $kategori->save();
        Session::flash("flash_notification", ["level"=>"success",
                                              "message"=>"Berhasil menyimpan data <b>".$kategori->nama_kategori."</b>"]);
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('backend.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \LogActivity::addToLog('Mengubah Data Kategori');
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori, '-');
        $kategori->save();
        Session::flash("flash_notification", ["level"=>"warning",
                                              "message"=>"Berhasil mengedit data <b>".$kategori->nama_kategori."</b>"]);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \LogActivity::addToLog('Menghapus Data Kategori');
        $kategori2 = Kategori::findOrFail($id);
        if(!Kategori::destroy($id)){
        return redirect()->back(); 
        }
        Session::flash("flash_notification", ["level"=>"danger",
                                              "message"=>"Berhasil menghapus data <b>".$kategori2->nama_kategori."</b>"]);
        return redirect()->route('kategori.index');
    }
}
