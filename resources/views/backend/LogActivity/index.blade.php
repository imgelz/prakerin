@extends('layouts.backend')
@section('content')
@include('layouts.flash')

<!-- Modal -->
<div class="modal modal-danger fade" id="modal-hapus-log" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Log Aktivitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" id="hapus-log" method="POST">
                    @csrf
                    @method('DELETE')
                <div class="form-group">
                  <label for="">Apakah Anda Ingin Menghapus Log Activity Ini ?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
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
                    <div class="alert alert-info">
                        <center><font color="blue"><h4><b>Log Activity</b></h4></font></center>
                        {{-- <center>
                            <h2 class="box-title">
                                <b><p>Log Aktivitas</p></b>
                            </h2>
                        </center> --}}
                    </div>

                    <div class="box-body">
                        <table id="dataTable" class="table table-striped">
                        <thead>
                            <th>No</th>
                            <th>Subject</th>
                            <th>URL</th>
                            <th>Method</th>
                            <th>IP</th>
                            <th width="300px">User Agent</th>
                            <th>User</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody class="data-log">
                            
                        </tbody>
                    </table>
                    </div>
                </div>
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
                ajax: "{{ route('logActivity.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'subject', name: 'subject'},
                    {data: 'url', name: 'url'},
                    {data: 'method', name: 'method'},
                    {data: 'ip', name: 'ip'},
                    {data: 'agent', name: 'agent'},
                    {data: 'user_name', name: 'user_name'},
                    {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
                ]
            });
            $('#modal-hapus-log').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var nama = button.data('nama') 
            var id = button.data('id')
            var modal = $(this)

            $('#hapus-log').attr('action', '/admin/logActivity/'+id)
        })
            
        });
    </script>
@endsection