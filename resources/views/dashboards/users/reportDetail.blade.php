@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Report')

@section('content')

    <div class="p-3">
        <h1>Laporan</h1>
        <form action="/user/reportDetail" method="get">
            <input type="hidden" name="id" value="<?=$_GET['id']?>" class="form-control mb-3">
            <select name="date" id="date" class="form-control mb-2">
                @foreach($date as $row)
                    <option value="{{$row->date}}">{{$row->date}}</option>
                @endforeach
            </select>
            <!-- <input type="date" name="date" class="form-control mb-3"> -->
            <button class="btn btn-info" type="submit">Cari Berdasarkan Tanggal</button>
        </form>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">Aktivitas</th>
                                    <th scope="col">Indikator</th>
                                    <th scope="col">Penilaian</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($report as $row)
                                <tr>
                                    <td>{{$row->activity}}</td>
                                    <td>{{$row->indicator}}</td>
                                    <td>{{$row->evaluation}}</td>
                                    <td>{{$row->date}}</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><?=$_GET['name']?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
