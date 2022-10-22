@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Data')

@section('content')

    <div class="p-3">
        <h1>Ajukan Anak Anda!</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Nama Panggilan</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Berapa Saudara</th>
                    <th scope="col">Aktivitas</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datachild as $row)
                <tr>
                    <td>{{$row->full_name}}</td>
                    <td>{{$row->nickname}}</td>
                    <td>{{$row->brith_place}}</td>
                    <td>{{$row->brith_date}}</td>
                    <td>{{$row->gender}}</td>
                    <td>Anak ke {{$row->child_siblings}} dari {{$row->child_siblings_of}}</td>
                    <td>{{$row->child_outside_activity}}</td>
                    <td>{{$row->religion}}</td>
                    <td>
                        <form action="registerChild/Entrusted" method="post">
                            @csrf
                            <input type="hidden" name="id_child" id="id_child" value="{{$row->id_biodataChild}}">
                            <button type="submit" class="btn btn-primary">
                                Ajukan
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
