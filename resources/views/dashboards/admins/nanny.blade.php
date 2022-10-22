@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Nanny')
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
              <h1>Pengasuh</h1>
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
            @foreach($nanny as $row)
            <div class="card">
              <div class="card-body">
                  <h2 class="card-title text-bold mb-1">
                    <span class="badge badge-primary">{{$row->full_name}}</span>
                  </h2>
                  <p class="card-text">
                    <span class="badge badge-warning">{{$row->brith_date}}</span>
                    <span class="badge badge-secondary">{{$row->gender}}</span>
                    <span class="badge badge-info">{{$row->religion}}</span>
                  </p>
                  <h4 class="card-title mt-1 mb-3">
                    <span class="badge badge-dark">{{$row->child_outside_activity}}</span>
                  </h4>

                  <form action="/nanny/InputNanny" method="post">
                    @csrf
                    <input type="hidden" id="idwaitinglist" name="idwaitinglist" value="{{$row->id_waitingList}}">
                    <input type="hidden" id="idchild" name="idchild" value="{{$row->id_biodataChild}}">
                    <select name="idnanny" id="idnanny" class="form-control mt-4">
                      <option value="">Pilih Pengasuh</option>
                      @foreach($employee as $rowEmployee)
                        <option value="{{$rowEmployee->id_biodataEmployee}}">{{$rowEmployee->full_name}}</option>
                      @endforeach
                    </select>
                    <button type="submit" class="btn btn-success mt-2">Pilih</button>
                  </form>
              </div>
            </div>
            @endforeach
              <div class="card">
                <div class="card-body">
                
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Nama Lengkap</th>
                      <th scope="col">Nama Panggilan</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">Agama</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($nannyProgress as $row)
                      <tr>
                          <td>{{$row->full_name}}</td>
                          <td>{{$row->nickname}}</td>
                          <td>{{$row->gender}}</td>
                          <td>{{$row->religion}}</td>
                          <td>Proses Pengasuhan</td>
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
