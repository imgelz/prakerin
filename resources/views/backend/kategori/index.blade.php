@extends('layouts.backend')
@section('content')
@include('layouts.flash')

<!-- Modal -->
<div class="modal modal-danger fade in" id="modal-hapus-kategori" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" id="hapus-kategori" method="POST">
                    @csrf
                    @method('DELETE')
                <div class="form-group">
                  <label for="">Apakah Anda Ingin Menghapus Kategori Ini ?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Ya</button>
            </div>
            </form>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <center>
                    <h3 class="box-title">
                        <a href="{{ route('kategori.create')}}"
                            class="btn btn-success fa fa-plus-square"> Tambah Kategori
                        </a>
                    </h3>
                    </center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody class="data-kategori">

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

@section('css')
    <link rel="stylesheet" href="/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('js')
    <script src="/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kategori.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama_kategori', name: 'nama_kategori'},
                    {data: 'slug', name: 'slug'},
                    {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
                ]
            });

            $('#modal-hapus-kategori').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var nama = button.data('nama') 
            var id = button.data('id')
            var modal = $(this)

            $('#hapus-kategori').attr('action', '/admin/kategori/'+id)
        })

        });
    </script>
@endsection
