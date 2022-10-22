@extends('dashboards.employees.layouts.employee-dash-layout')
@section('title','Parent')
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
              <h1>Data Orang Tua</h1>
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
                      <th scope="col">No. Telp</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">No. Telp</th>
                      <!-- <th scope="col">Aksi</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($parent as $row)
                      <tr>
                          <td>{{$row->father_name}}</td>
                          <td>{{$row->mother_name}}</td>
                          <td>{{$row->phone_number}}</td>
                          <td>{{$row->address}}</td>
                          <td>{{$row->phone_number}}</td>
                          <!-- <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail{{$row->id_biodataChild}}">
                                Detail Anak
                              </button>
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalActivity{{$row->id_biodataChild}}">
                                Aktivitas Anak
                              </button>
                          </td> -->
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
