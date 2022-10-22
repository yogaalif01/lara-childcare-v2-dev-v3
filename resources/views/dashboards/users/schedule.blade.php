@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Schedule')

@section('content')

    <div class="p-3">
        <h1>Schedule</h1>
        
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
    </div>

@endsection
