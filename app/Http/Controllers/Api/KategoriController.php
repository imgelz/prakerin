<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $kategori = Kategori::all();
        if (count($kategori) <= 0 ) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Kategori Menghilang'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'Berhasil'
        ];

        return response()->json($response, 200);
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
        //1.Tampung semua inputan ke $input 
        $input = $request->all();

        //2. Buat validasi ditampung ke $validator
        $validator = Validator::make($input,[
            'nama_kategori' => 'required|unique:kategoris'
        ]);

        //3. Chek validasi
        if ($validator->fails()){
            $response = [
                'success' => false,
                'data' => 'Validator Error',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori,'-');
        $kategori->save();

        //4. buat fungsi untuk menghendle semua inputan->dimasukkan kke table
        
        
        //5. menampilkan response
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'Kategori Berhasil Ditambah'
        ];

        //6. Tampilkan hasil
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $kategori = Kategori::Find($id);
        $input = $request->all();

        if (!$kategori) {
            $response = [
                'success' => false,
                'data' => 'Gagal Update',
                'message' => 'Kategori Menghilang'
            ];

            return response()->json($response, 404);
    }
    $validator = Validator::make($input,[
            'nama_kategori' => 'required|min:10'
        ]);

     if ($validator->fails()){
            $response = [
                'success' => false,
                'data' => 'Validator Error',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);

        }
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori, '-');
        $kategori->save();

        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'Nama Kategori di Ubah'
        ];

        return response()->json($response, 200);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $kategori = Kategori::Find($id);

        if (!$kategori) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Kategori Menghilang'
            ];

            return response()->json($response, 404);
    }

    $kategori->delete();
    $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'Kategori dihapus'
        ];

        return response()->json($response, 200);
    }
}
