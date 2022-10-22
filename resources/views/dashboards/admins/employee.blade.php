@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Employee')
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
            <div class="col-md-12 d-flex justify-content-between">
              <h1>Karyawan</h1>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#exampleModal">
                Tambah Karyawan +
              </button>
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
                      <th scope="col">Nama</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">Religion</th>
                      <th scope="col">No. Telp</th>
                      <th scope="col">Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($biodataEmployee as $row)
                      <tr>
                          <td>{{$row->name}}</td>
                          <td>{{$row->gender}}</td>
                          <td>{{$row->religion}}</td>
                          <td>{{$row->phone_number}}</td>
                          <td>{{$row->address}}</td>
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

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Karyawan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form action="/employee/InputForm" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <hr>
                <div class="form-group">
                  <label for="exampleInputPassword1">Full Name</label>
                  <input type="text" name="full_name" id="full_name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Gender</label>
                  <select name="gender" id="gender" class="form-control">
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Join Date</label>
                  <input type="date" name="join_date" id="join_date" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Birth Date</label>
                  <input type="date" name="brith_date" id="brith_date" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Birth Place</label>
                  <input type="text" name="brith_place" id="brith_place" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <textarea name="address" id="address" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone Number</label>
                  <input type="number" name="phone_number" id="phone_number" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <input type="text" name="status" id="status" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Religion</label>
                  <select name="religion" class="form-control" id="religion">
                      <option value="Islam">Islam</option>
                      <option value="Katholik">Katholik</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Konghucu">Konghucu</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Last Education</label>
                  <input type="text" name="last_education" id="last_education" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Institution</label>
                  <input type="text" name="institution" id="institution" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    

@endsection
