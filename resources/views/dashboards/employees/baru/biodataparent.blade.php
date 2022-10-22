@extends('dashboards.employees.layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('parent','active')

@section('isi')


            <div class="row">
            <div class="col-xs-12">
                
            <div class="box box-primary">
                   
                    <div class="box-header">
                    <h3 class="box-title">Data Biodata Orang tua</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Ayah</th>
                        <th>Nama Ibu</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                     
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($parent as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$row->father_name}}</td>
                                <td>{{$row->mother_name}}</td>
                                <td>{{$row->phone_number}}</td>
                                <td>{{$row->address}}</td>
                                <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Hapus</button>
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