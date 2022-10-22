@extends('dashboards.employees.layouts.employee-dash-layout')
@section('title','Child')
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
            <div class="col-sm-11">
              <h1>Data Anak</h1>
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
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($child as $row)
                      <tr>
                          <td>{{$row->father_name}}</td>
                          <td>{{$row->mother_name}}</td>
                          <td>{{$row->full_name}}</td>
                          <td>{{$row->gender}}</td>
                          <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail{{$row->id_biodataChild}}">
                                Detail Anak
                              </button>
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalActivity{{$row->id_biodataChild}}">
                                Aktivitas Anak
                              </button>
                          </td>
                      </tr>
                      <!-- Modal Activity -->
                      <div class="modal fade" id="modalActivity{{$row->id_biodataChild}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Aktivitas</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <form action="/employee/childDetail/InputFormACtivity" method="post">
                                @csrf
                                <input type="hidden" value="{{$row->id_biodataChild}}" id="id" name="id">
                                <div class="modal-body">
                                  @php
                                    echo '<h5><span class="badge badge-warning">'.date("Y-m-d").'</span></h5>';
                                  @endphp
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Aktivitas:</label>
                                    <input type="text" class="form-control" name="activity" id="activity">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Indikator:</label>
                                    <textarea name="detail_activity" id="detail_activity" rows="5" class="form-control"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Penilaian:</label>
                                    <select name="status" id="status" class="form-control">
                                      <option value="Perlu Arahan">Perlu Arahan</option>
                                      <option value="Perlu Latihan">Perlu Latihan</option>
                                      <option value="Sudah Baik">Sudah Baik</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </form>
                            
                          </div>
                        </div>
                      </div>

                      <!-- Modal Detail -->
                      <div class="modal fade" id="modalDetail{{$row->id_biodataChild}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Anak</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <form action="/employee/childDetail/InputForm" method="post">
                                @csrf
                                <input type="hidden" value="{{$row->id_biodataChild}}" id="id" name="id">
                                <div class="modal-body">
                                  @php
                                    echo '<h5><span class="badge badge-warning">'.date("Y-m-d").'</span></h5>';
                                  @endphp
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Kondisi:</label>
                                    <input type="text" class="form-control" name="condition" id="condition">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Kesehatan:</label>
                                    <input type="text" class="form-control" name="health" id="health">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </form>
                          </div>
                        </div>
                      </div>
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
