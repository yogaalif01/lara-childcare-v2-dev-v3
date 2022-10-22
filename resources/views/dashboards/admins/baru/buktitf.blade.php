@extends('dashboards.admins.layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('buktitf','active')
@section('isi')
<div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
                <div class="box-header">
                <h3 class="box-title">Data Pendaftaran Anak Bukti Transfer</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Nama Anak</th>
                    <th>Paket Layanan</th>
                    <th>Tanggal</th>
                    <th>Bukti tF</th>
                    <th>status</th>
                    <th>Valdiasi</th>
                    </tr>   
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                    @endphp
                        @foreach($transactionDone as $row)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$row->father_name}}</td>
                            <td>{{$row->mother_name}}</td>
                            <td>{{$row->full_name}}</td>
                            <td>{{ $row->nama_paket }}</td>
                            <td>{{ $row->keterangan_paket }}</td>
                            <td>
                              @if ($row->link_transfer == null)
                              Belum Ditransfer    
                              @else
                              <img src="{{ url('img/trans/'.$row->link_transfer) }}" alt="" width="40%">
                              @endif
                              
                            </td>
                            <td>
                              Berhasil
                            </td>
                            <td>
                                @if ($row->link_transfer == null)
                                Belum Ditransfer    
                                @else
                                    @if ($row->status_pembayaran == "validasi")
                                    <a href=""><button class="btn btn-danger">Validasi Bukti Pembayaran</button></a>
                                    @else
                                    Sudah Divalidasi
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
          $('#example3').DataTable()
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
@endsection