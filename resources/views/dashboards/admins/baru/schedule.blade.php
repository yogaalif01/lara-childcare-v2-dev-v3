@extends('dashboards.admins.layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('admin/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection
@section('schedule','active')

@section('isi')
            <div class="row">
              <div class="col-xs-12">
                  @if ($message = Session::get('Sukses'))
                  <div class="callout callout-success">
                                  <h4>Information</h4>
                                  <p>{{ $message }}</p>
                  </div>
                  @endif
                  @if ($message = Session::get('gagal'))
                  <div class="callout callout-danger">
                                  <h4>Information</h4>
                                  <p>{{ $message }}</p>
                  </div>
                  @endif
              </div>
            <div class="col-xs-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                   Schedulekan anak
                </button>
            <br>
            <br>
            <div class="box box-primary">
                  
                    <div class="box-header">
                    <h3 class="box-title">Data Schedule Anak</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Tema</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        </tr>
                        </thead>
                        @php
                            $no = 1;
                        @endphp
                        <tbody>
                            @foreach ($schedule as $item)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $item->tema }} </td>
                                    <td> {{ $item->nama_kegiatan }} </td>
                                    <td> {{ $item->date  }} </td>
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
@section('modal')
<div class="modal fade" id="modal-default">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Form Schedule Anak</h4>
        </div>
        <form class="form-horizontal" enctype="multipart/form-data" method="POST" action=" {{ url('/admin/postSchedule') }} ">
        @csrf
          <div class="modal-body">
                    <div class="box-body">
                        {{-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Nama Anak</label>
            
                                <div class="col-sm-8">
                                    <select name="id_biodataChild" id="" class="form-control">
                                        <option value="">Pilih Anak</option>
                                        @foreach ($anak as $item)
                                    <option value="{{ $item->id_biodataChild }}"> {{ $item->full_name }} </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Tanggal</label>
            
                                <div class="col-sm-8">
                                    <input type="date" name="date" class="form-control">

                                </div>
                        </div> --}}
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Tema</label>
            
                                <div class="col-sm-8">
                                  <input type="text" name="tema" class="form-control">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Nama_kegiatan</label>
            
                                <div class="col-sm-8">
                                   <textarea name="note" id="" cols="30" rows="10" class="form-control">

                                   </textarea>

                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-sm-4">Jam Datang:</label>

                                <div class="col-sm-8">
                                    
                                    <div class="input-group">
                                        <input type="text" name="jam_datang" class="form-control timepicker">

                                        <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
              
                                
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4">Jam Pulang:</label>
    
                                    <div class="col-sm-8">
                                        
                                        <div class="input-group">
                                            <input type="text" name="jam_pulang" class="form-control timepicker1">
    
                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                            </div> --}}
                          
                        
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}  </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                       
                        
                    </div>

             
                  
        </div>
        <div class="modal-footer">
    
          <button type="submit" class="btn btn-primary btn-block" id="simpanedit">S I M P A N</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
@section('js')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script>
      $('.timepicker').timepicker({
      showInputs: false
    })
    $('.timepicker1').timepicker({
      showInputs: false
    })
</script>
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