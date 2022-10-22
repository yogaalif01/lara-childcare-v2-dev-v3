@extends('dashboards.employees.layouts.employee-dash-layout')
@section('title','Attendance')
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
              <h1>Absen Kehadiran</h1>
            </div>
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
                      <th scope="col">Tanggal</th>
                      <th scope="col">Jam</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($attendance as $row)
                      <tr>
                          <td>{{$row->date}}</td>
                          <td >{{$row->time}}</td>
                          <td>
                            <span class="badge badge-success">{{$row->status}}</span>  
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
    

@endsection
