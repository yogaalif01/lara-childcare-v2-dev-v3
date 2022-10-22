@extends('dashboards.admins.layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('register','active')

@section('isi')
            <div class="row">
            <div class="col-xs-12">
            <div class="box box-primary">
                    <div class="box-header">
                    <h3 class="box-title">Data Approve Pendaftar</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Login Sebagai Apa</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                        @foreach ($register as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                @if ($item->status == "belum acc")
                                <a href="{{ url('/admin/aprove/'.$item->email) }}"><button class="btn btn-success">Disetujui</button></a>
                                <a href="{{ url('/admin/tolakaprove/'.$item->email) }}"><button class="btn btn-danger">Ditolak</button></a>
                                @else
                                    @if ($item->status == "acc")
                                        Pengajuan DI ACC
                                    @else
                                        Pengajuan Ditolak
                                    @endif
                                @endif
                                
                            </td>
                         </tr>
                        @endforeach
                       </tbody>
                      
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                </div>
            </div>
@endsection
@section('js')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
</script>
@endsection