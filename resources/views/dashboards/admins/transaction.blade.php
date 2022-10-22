@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Transaction')
@section('css')
  <style>
    .card-body table {
      table-layout: fixed;
    /* word-wrap: break-word; */
      white-space: nowrap;
    }

    .card-body table td {
      overflow: hidden;
    }
  </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Validasi Transaksi</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Nama Ayah</th>
                      <th scope="col">Nama Ibu</th>
                      <th scope="col">Nama Anak</th>
                      <th scope="col">Nominal</th>
                      <th scope="col">Bukti Transfer</th>
                      <th scope="col">Date</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transaction as $row)
                      <tr>
                          <td>{{$row->father_name}}</td>
                          <td>{{$row->mother_name}}</td>
                          <td>{{$row->namechild}}</td>
                          <td>{{$row->nominal}}</td>
                          <td>
                              <img style="width: 100%;" src="{{ URL::to('/') }}/img/trans/{{$row->link_transfer}}" alt=""  data-toggle="modal" data-target="#imgModal{{$row->id_transaction}}">
                              <!-- Modal -->
                              <div class="modal fade" id="imgModal{{$row->id_transaction}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <img style="width: 100%;" src="{{ URL::to('/') }}/img/trans/{{$row->link_transfer}}" alt=""  data-toggle="modal" data-target="#imgModal{{$row->id_transaction}}">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </td>
                          <td>{{$row->date}}</td>
                          <td>
                            <form action="/transaction/Approve" method="post">
                              @csrf
                              <input type="hidden" name="idchild" id="idchild" value="{{$row->id_biodataChild}}">
                              <input type="hidden" name="idtrans" id="idtrans" value="{{$row->id_transaction}}">
                              <button type="submit" class="btn btn-success">Setujui</button>
                            </form>
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
                </table>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
      <!-- /.content -->

      <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Transaksi Berhasil</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Nama Ayah</th>
                      <th scope="col">Nama Ibu</th>
                      <th scope="col">Nama Anak</th>
                      <th scope="col">Nominal</th>
                      <th scope="col">Bukti Transfer</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transactionDone as $row)
                      <tr>
                          <td>{{$row->father_name}}</td>
                          <td>{{$row->mother_name}}</td>
                          <td>{{$row->namechild}}</td>
                          <td>{{$row->nominal}}</td>
                          <td>
                            <img style="width: 100%;" src="{{ URL::to('/') }}/img/trans/{{$row->link_transfer}}" alt=""  data-toggle="modal" data-target="#imgModalApp{{$row->id_transaction}}">
                            <!-- Modal -->
                            <div class="modal fade" id="imgModalApp{{$row->id_transaction}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <img style="width: 100%;" src="{{ URL::to('/') }}/img/trans/{{$row->link_transfer}}" alt=""  data-toggle="modal" data-target="#imgModal{{$row->id_transaction}}">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- <img style="width: 40px; height: 30px; object-fit: cover;" src="https://i.ibb.co/ZNm1mxw/New-Wireframe-1-copy-2.png" alt=""> -->
                          </td>
                          <td>{{$row->date}}</td>
                          <td>Berhasil</td>
                      </tr>
                  @endforeach
                  </tbody>
                </table>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
      <!-- /.content -->
    

@endsection
