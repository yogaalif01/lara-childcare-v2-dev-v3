@extends('dashboards.admins.layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('transaksi','active')

@section('isi')
        <div class="row">
            <div class="col-xs-12">
            <div class="box box-primary">
                    <div class="box-header">
                    <h3 class="box-title">Data Pendaftaran Anak Belum Disetujui</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                        <th style="5%">No</th>
                        <th style="width: 10%">Nama Ayah</th>
                        <th style="width: 10%">Nama Ibu</th>
                        <th style="width: 15%">Nama Anak</th>
                        <th style="width: 15%">Paket Layanan</th>
                        <th style="width: 15%">Tanggal Mulai</th>
                        <th style="width: 15%">Action</th>
                        </tr>   
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                        @endphp
                            @foreach($transaction as $row)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$row->father_name}}</td>
                                <td>{{$row->mother_name}}</td>
                                <td>{{$row->full_name}}</td>
                      
                              <td>{{ $row->nama_paket }}</td>
                              <td>{{ $row->keterangan_paket }}</td>
                              <td>
                                  <form action="{{ url('/transaction/Approve') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="idchild" id="idchild" value="{{$row->id_biodataChild}}">
                                    <input type="hidden" name="idtrans" id="idtrans" value="{{$row->id_transaction}}">
                                    <button type="submit" class="btn btn-success btn-block">Setujui</button>
                                  </form>
                                  <form action="{{ url('/transaction/Tolak') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="idchild" id="idchild" value="{{$row->id_biodataChild}}">
                                    <input type="hidden" name="idtrans" id="idtrans" value="{{$row->id_transaction}}">
                                    <button type="submit" class="btn btn-danger btn-block">Tolak</button>
                                  </form>
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

            <div class="row">
                <div class="col-xs-12">
                <div class="box box-primary">
                        <div class="box-header">
                        <h3 class="box-title">Data Pendaftaran Anak Disetujui</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Nama Anak</th>
                 
                            <th>Paket Layanan</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
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
                                    <td>Berhasil</td>
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
                            <h3 class="box-title">Data Pendaftaran Anak Tidak Disetujui</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Nama Anak</th>
              
                                <th>Paket Layanan</th>
                                <th>Tanggal Mulai</th>
                                <th>Status</th>
                                </tr>   
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                @endphp
                                    @foreach($transactionDitolak as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->father_name}}</td>
                                        <td>{{$row->mother_name}}</td>
                                        <td>{{$row->full_name}}</td>
                                        <td>{{ $row->nama_paket }}</td>
                                        <td>{{ $row->keterangan_paket }}</td>
                                        <td>Ditolak</td>
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