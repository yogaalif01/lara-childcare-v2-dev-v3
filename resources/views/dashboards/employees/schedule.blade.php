@extends('dashboards.employees.layouts.employee-dash-layout')
@section('title','Schedule Child')
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
              <h1>Schedule Anak</h1>
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
                        <th scope="col">Judul Kegiatan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam Datang</th>
                        <th scope="col">Jam Pulang</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <form action="/schedule/InputForm" method="post">
                            @csrf
                            <td>
                              <input type="hidden" class="form-control" value="<?=$_GET["id"]?>" name="idchild" id="idchild">
                              <input type="text" class="form-control" name="note" id="note">
                            </td>
                            <td>
                              <input type="date" class="form-control" name="date" id="date">
                            </td>
                            <td>
                              <input type="time" class="form-control" name="time_come" id="time_come">
                            </td>
                            <td>
                              <input type="time" class="form-control" name="time_gohome" id="time_gohome">
                            </td>
                            <td>
                              <button type="submit" class="btn btn-success">Submit</button>
                            </td>
                          </form>
                      </tr>
                    </tbody>
                  </table>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Judul Kegiatan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam Datang</th>
                        <th scope="col">Jam Pulang</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($schedule as $row)
                        <tr>
                          <td >{{$row->note}}</td>
                          <td >{{$row->date}}</td>
                          <td >{{$row->time_come}}</td>
                          <td >{{$row->time_gohome}}</td>
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
