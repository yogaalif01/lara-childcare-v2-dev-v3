@extends('dashboards.admins.layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('dataabsen','active')

@section('isi')
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Data Absensi Karyawan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam Datang</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($karyawan as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td> {{ $item->full_name }} </td>
                                    <td> {{ $item->date }} </td> 
                                    <td> {{ $item->time }} </td> 
                                    <td> 16:30</td> 
                                    <td> {{ $item->status }} </td> 
                                </tr>                                
                            @endforeach
                       </tbody>
                       
                      
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-primary">
                          <div class="box-header">
                            <h3 class="box-title">Data Absensi Anak</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jam Datang</th>
                                <th>Jam Pulang</th>
                                <th>Pengantar</th>
                                <th>Yang Jemput</th>
                                <th>Keterangan</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($anak as $item)
                                        <tr>
                                            <td> {{ $no++ }} </td>
                                            <td>{{ $item->full_name }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->jam_datang }}</td>
                                            <td>{{ $item->jam_pulang }}</td>
                                            <td>{{ $item->pengantar }}</td>
                                            <td>{{ $item->penjemput }}</td>
                                            <td>{{ $item->keterangan }}</td>
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
              <h4 class="modal-title">Form Edit Karyawan</h4>
            </div>
            <div class="modal-body">
                    <form class="form-horizontal" method="POST">
                        @csrf
                        <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4">Nama</label>
        
                            <div class="col-sm-8">
                            <input type="email" class="form-control" id="nama" placeholder="Email" name="full_name" >
                            </div>
                        </div>
                        <input type="text" id="id_dataEmployee" hidden>
                        <input type="text" id="id_account" hidden>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Jenis Kelamin</label>
            
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="jk" placeholder="Email" name="gender">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Tanggal Bergabung</label>
            
                                <div class="col-sm-8">
                                <input type="date" class="form-control" id="join_date" placeholder="Email" name="join_date">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Tanggal Lahir</label>
            
                                <div class="col-sm-8">
                                <input type="date" class="form-control" id="brith_date" placeholder="Email" name="brith_date">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Tempat Lahir</label>
            
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="brith_place" placeholder="Email" name="brith_place">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Religion</label>
            
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="religion" placeholder="Email" name="religion">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">No Telepon</label>
            
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="notelp" placeholder="Email" name="phone_number">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Alamat</label>
            
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" placeholder="Email" name="address">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">status</label>
            
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="status" placeholder="Email" name="status">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Pendidikan Terakhir</label>
            
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_education" placeholder="Email" name="last_education">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Institusi</label>
            
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="institution" placeholder="Email" name="institution">
                                </div>
                        </div>

                        </div>
                    </form>
                      
            </div>
            <div class="modal-footer">
        
              <button type="button" class="btn btn-primary btn-block" id="simpanedit">S I M P A N</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection
@section('js')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{asset('admin/sweetalert.min.js')}}"></script>
<script src="{{asset('admin/sweetalert.js')}}"></script>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
        
</script>
<script>
    $(document).ready(function() {

         $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')  }
        });

        $('#modal-default').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
                tampildata(id);
        });
        
        $('#simpanedit').click(function() {
            swal({
         title: 'KONFIRMASI',
         text: 'Apakah anda yakin ingin mengedit data ini ?',
         icon: 'warning',
         buttons: true,
         cancelButtonText:'BATAL',
         dangerMode: true,
      })
         .then((willDelete) => {
            if (willDelete) {
                        swal({title: "Sukses", text: "Data Berhasil Diedit", type:
          "success"}).then(function(){

            var id_biodataEmployee = $('#id_dataEmployee').val();
            var id_account =  $('#id_account').val();
            var full_name = $('#nama').val();
            var gender = $('#jk').val();
            var join_date = $('#join_date').val();
            var brith_date = $('#brith_date').val();
            var brith_place = $('#brith_place').val();
            var address = $('#alamat').val();
            var phone_number = $('#notelp').val();
            var status = $('#status').val();
            var religion = $('#religion').val();
            var last_education = $('#last_education').val();
            var institution = $('#institution').val();     

                $.ajax({
                  url  : "{{ url('/admin/updatekaryawan') }}" + "/" + id_biodataEmployee,
                  type : "POST",
                  data : {id_account:id_account,full_name:full_name,gender:gender,join_date:join_date,brith_date:brith_date,brith_place:brith_place,
                  address:address,phone_number:phone_number,status:status,religion:religion,last_education:last_education,institution:institution},
                  success:function(data) {
                    console.log(data)
                    location.reload();
                  },
                  error:function(data) {
                    console.log(data);
                  }
                })



            }
          );

            }
         });
        });

    });

    function tampildata(id)
    {
        $.ajax({
            url : "{{ url('/admin/editkaryawan') }}" + "/" + id,
            type:"GET",
            success:function(data) {
              var data = JSON.parse(data);
              console.log(data);
              $('#id_dataEmployee').val(data['data']['id_biodataEmployee']);
              $('#id_account').val(data['data']['id_account']);
              $('#nama').val(data['data']['full_name']);
              $('#jk').val(data['data']['gender']);
              $('#join_date').val(data['data']['join_date']);
              $('#brith_date').val(data['data']['brith_date']);
              $('#brith_place').val(data['data']['brith_place']);
              $('#alamat').val(data['data']['address']);
              $('#notelp').val(data['data']['phone_number']);
              $('#status').val(data['data']['status']);
              $('#religion').val(data['data']['religion']);
              $('#last_education').val(data['data']['last_education']);
              $('#institution').val(data['data']['institution']);
              
            },
            error:function(data) {
              console.log(data);
            }
        });
    }
    function deletex(id)
    {

            swal({
          title: 'Anda yakin ?',
          text: 'Data yang telah dihapus tidak dapat dikembalikan lagi',
          icon: 'warning',
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
           swal('Sukses', 'Data berhasil Di hapus', 'success').then(
             function(){
                  $.ajax({
                      url:"{{url('/deletekaryawan')}}"+ "/" + id,
                      type:"GET",
                      success:function(data){
                      console.log(data)
                      window.location.reload();
                      },
                      error:function(data){
                        console.log(data.responseText);
                      }


                  })
             }
           );


              // window.location.reload();

            }
        });
    }

</script>
@endsection