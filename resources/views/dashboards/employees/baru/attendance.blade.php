@extends('dashboards.employees.layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('attendance','active')

@section('isi')


            <div class="row">
              <div class="col-xs-12">
                  @if ($message = Session::get('sukses'))
                  <div class="callout callout-success">
                                  <h4>Information</h4>
                                  <p>{{ $message }}</p>
                  </div>
                  @endif
                  @if ($message = Session::get('Gagal'))
                  <div class="callout callout-danger">
                                  <h4>Information</h4>
                                  <p>{{ $message }}</p>
                  </div>
                  @endif
              </div>
            <div class="col-xs-12">
              <a href=" {{ url('/employee/absen') }} "> 
                <button class="btn btn-success"> <span class="fa fa-plus"></span> A B S E N</button>
              </a>
            <br>
            <br>
            <div class="box box-primary">
                    @foreach($count as $row)
                    @if($row->total < 1)
                      <div class="col-sm-1">
                        <form action="/attendance/InputForm" method="post">
                          @csrf
                          <button type="submit" class="btn btn-primary">Hadir</button>
                        </form>
                      </div>
                    @endif
                  @endforeach
                    <div class="box-header">
                    <h3 class="box-title">Data Absen Kehadiran</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Total Jam Kerja</th>
                        <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                        @foreach($attendance as $row)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$row->date}}</td>
                            <td>{{$row->time}}</td>
                            <td>16:30</td>
                            <td>
                              @php
                                      $cek = strtotime("16:30:00") - strtotime($row->time);
                                      $hasil = floor($cek/(60*60));
                              @endphp
                              {{ $hasil }}
                            </td>
                            <td>
                              <span class="badge badge-success">{{$row->status}}</span>  
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