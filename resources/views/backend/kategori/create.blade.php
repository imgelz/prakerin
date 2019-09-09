@extends('layouts.backend')

@section('content')

<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box">
                <center><h3><b><div class="box-header">Tambahkan Kategori</div></b></h3></center>

                <div class="box-body">
                   <form action="{{ route('kategori.store') }}" method="POST">
                    {{ csrf_field() }}
                       <div class="form-group">
                           <label for="">Nama Kategori</label>
                       <input class="form-control {{ $errors->has('nama_kategori') ? ' is-invalid' : '' }}" type="text" name="nama_kategori">
                       @if ($errors->has('nama_kategori'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_kategori') }}</strong>
                                    </span>
                        @endif
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-success">Simpan Data</button>
                       </div>
                   </form>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection