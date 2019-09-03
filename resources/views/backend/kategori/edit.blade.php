@extends('layouts.backend')

@section('content')
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">Edit Data Kategori</div>

                <div class="box-body">
                   <form action="{{ route('kategori.update',$kategori->id) }}" method="POST">
                    <input type="hidden" value="PATCH" name="_method">
                    {{ csrf_field() }}
                       <div class="form-group">
                           <label for="">Nama Kategori</label>
                            <input class="form-control" type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-outline-info">Edit & Simpan Data</button>
                       </div>
                   </form>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection