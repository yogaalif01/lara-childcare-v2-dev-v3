@extends('dashboards.admins.layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('nanny','active')

@section('isi')
<div class="row">
    <div class="col-md-12">
    @foreach($nanny as $row)
    <div class="box box-primary">
      <div class="box-body">
          <h2 class="box-title text-bold mb-1">
            <span class="badge badge-primary">{{$row->full_name}}</span>
          </h2>
          <p class="box-text">
            <span class="badge badge-warning">{{$row->brith_date}}</span>
            <span class="badge badge-secondary">{{$row->gender}}</span>
            <span class="badge badge-info">{{$row->religion}}</span>
          </p>
          <h4 class="box-title mt-1 mb-3">
            <span class="badge badge-dark">{{$row->child_outside_activity}}</span>
          </h4>

          <form action="{{ url('/nanny/InputNanny') }}" method="post">
            @csrf
            <input type="hidden" id="idwaitinglist" name="idwaitinglist" value="{{$row->id_waitingList}}">
            <input type="hidden" id="idchild" name="idchild" value="{{$row->id_biodataChild}}">
            <select name="idnanny" id="idnanny" class="form-control mt-4">
              <option value="">Pilih Pengasuh</option>
              @foreach($employee as $rowEmployee)
                <option value="{{$rowEmployee->id_biodataEmployee}}">{{$rowEmployee->full_name}}</option>
              @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-success">Pilih</button>
          </form>
      </div>
    </div>
    @endforeach
    </div>
</div>

            <div class="row">
            <div class="col-xs-12">
            <div class="box box-primary">
                    <div class="box-header">
                    <h3 class="box-title">Data Pengasuhan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Panggilan</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                           
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