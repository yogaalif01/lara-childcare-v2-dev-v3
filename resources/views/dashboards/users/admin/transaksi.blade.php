@extends('dashboards.users.admin.template')
@section('trans','active')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('isi')
<div class="row">
    <div class="col-xs-12">
            <div class="callout callout-danger">
                    <h4>Information</h4>
    
                    <p>Batas waktu untuk transaksi pembayaran dilakukan selambat-lambatnya tanggal 5 bulan berjalan</p>
                  </div>
    </div>
    <div class="col-xs-12">
    <div class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Transaksi Anak</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th style="width: 10%">Nama anak</th>
                <th style="width: 15%">Tanggal Daftar</th>
                <th  style="width: 15%">Nominal</th>
                <th  style="width: 15%">Bukti TF</th>
                <th  style="width: 15%">Status</th>
                <th  style="width: 15%">Paket</th>
                <th  style="width: 15%">Action</th>
                </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                 @foreach ($data as $item)
                     <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->nominal }}</td>
                        <td>
                        <img width="100%" src="{{ url('/img/trans/'.$item->link_transfer) }}" alt="">
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->nama_paket }}</td>
                        <td>
                            @if ($item->status == "Validation")
                                Masih Proses Pengecekan
                            @else
                            @if ($item->link_transfer == null)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" data-id="{{ $item->id_transaction }}">
                                Upload Bukti TF
                            </button>
                            @else
                                Sudah Melakukan Pembayaran
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
@section('modal')
<div class="modal fade" id="modal-default">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Upload Bukti TF</h4>
        </div>
        <form class="form-horizontal" enctype="multipart/form-data" method="POST">
        <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Atas Nama</label>
            
                                <div class="col-sm-8">
                                    <input type="text" name="atas_nama" class="form-control" id="atas_nama">

                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4">Nama Bank</label>
                
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_bank" class="form-control" id="nama_bank">
    
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Upload Bukti TF</label>
            
                                <div class="col-sm-8">
                                    <input name="foto" type="file" class="form-control" id="fileInput">

                                </div>
                                <br>
                                <br>
                                <div id="output" style="margin-left: 200px;"></div>
                            </div>
                        
                    </div>

             
                  
        </div>
        <div class="modal-footer">
    
          <button type="button" class="btn btn-primary btn-block" id="simpanedit">S I M P A N</button>
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
<script src="{{asset('admin/sweetalert.js')}}"></script>
<script src="{{asset('admin/sweetalert.min.js')}}"></script>
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

<script>
    $(document).ready(function() {

          $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')  }
 });

            $('#modal-default').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                $('#simpanedit').click(function() {
                
            swal({
                title: 'KONFIRMASI',
                text: 'Apakah anda yakin ingin Melakukan Transaksi ?',
                icon: 'warning',
                buttons: true,
                cancelButtonText:'BATAL',
                dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
                        swal({title: "Sukses", text: "Data Berhasil Diedit", type:
        "success"}).then(function(){
                    var link_transfer = $('#fileInput').val();
                    var image = $("input[type=file]")[0].files[0];
                    var atas_nama = $('#atas_nama').val();
                    var nama_bank = $('#nama_bank').val();
                    var form = new FormData();
                    form.append('foto',image);
                    form.append('atas_nama',atas_nama);
                    form.append('nama_bank',nama_bank);
                  
      

                        $.ajax({
                        url : "{{ url('/user/uploadbuktiTF') }}" + "/" + id,
                        type : "POST",
                        data :form,
                        cache: false,
                        contentType: false,
                        processData: false,
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
    });
</script>

<script>
    window.onload = function()
  {
      var fileInput = document.getElementById('fileInput');
      var output = document.getElementById('output');


      fileInput.addEventListener('change', function(e)
      {
          var file = fileInput.files[0];

          var imageType = /image.*/;
          if (file.type.match(imageType))
          {
              var reader = new FileReader();
              reader.onload = function(e)
              {
                output.innerHTML = "";
                var img = new Image();
                img.src = reader.result;
                img.height = 100;


                output.appendChild(img);

              }

              reader.readAsDataURL(file);
          }
      else
          {
            output.innerHTML = "File not supported!";
          }
      });
  }
  </script>
@endsection