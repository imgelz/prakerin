@extends('layouts.backend')

@section('content')
@include('layouts.flash')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <center>
                    <h3 class="box-title">
                        <a href="{{ route('kategori.create')}}"
                            class="btn btn-success">Tambah Kategori
                        </a>
                    </h3>
                    </center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="dataTable" class="table table-striped" border="1">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th colspan="2">Aksi</th>
                        </thead>
                        <tbody class="data-categories">
                             @php $no = 1; @endphp
                            @foreach ($kategori as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_kategori }}</td>
                                    <td>{{ $data->slug }}</td>
                                    </td>
                                    <td>
                                        <a href="{{ route('kategori.edit', $data->id)}}"
                                        class="btn btn-info">Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('kategori.destroy', $data->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                           <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection