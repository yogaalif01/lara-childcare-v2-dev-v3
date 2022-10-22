@extends('dashboards.users.admin.template')
@section('danak','active')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('isi')
<div class="row">
        <div class="col-xs-12">
        @if ($message = Session::get('sukses'))
        <div class="callout callout-danger">
                        <h4>Information</h4>
                        <p>{{ $message }}</p>
        </div>
        @endif
        </div>
    <div class="col-xs-12">
    <div class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Data Anak Yang Terdaftar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Birth Date</th>
                <th>Paket Layanan</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @foreach ($cekanak as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->brith_date }}</td>
                           <td>{{ $item->nama_paket }}, {{ $item->keterangan_paket }}</td>
                        <td>
                            {{ $item->status }}
                      
                        </td>
                        <td>
                        <a href="{{ url('/user/editanak/'.$item->id_biodataChild) }}" class="btn btn-primary">Edit</a>
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
        $(document).ready(function(){
           $(".callout").delay(2000).slideUp(300);
        });
</script>
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