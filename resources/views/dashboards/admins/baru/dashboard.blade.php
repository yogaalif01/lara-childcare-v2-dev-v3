@extends('dashboards.admins.layouts.template')
@section('dashboard','active')
@section('header')
    <h1>Selamat Datang Admin</h1>
    <br>
    <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/user2-160x160.jpg') }}" alt="User profile picture">

              <h3 class="profile-username text-center">Admin</h3>

              <p class="text-muted text-center">Admin</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <input type="file" class="form-control">
                </li>
                
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Change Picture</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          {{-- <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div> --}}
          <!-- /.box -->
        </div>

        <div class="col-md-8">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              
              </ul>
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" method="POST" action="{{ route('adminUpdateInfo') }}" >
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Name</label>
      
                          <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputName" value="{{ Auth::user()->name }}" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail" class="col-sm-2 control-label">Email</label>
      
                          <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      </form>
                </div>
            
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
@endsection