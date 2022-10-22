@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Report')

@section('content')

    <div class="p-3">
        <h1>Pilih Anak</h1>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="row">
                @foreach($child as $row)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-bold">{{$row->full_name}}</h5>
                                <p class="card-text">
                                    <span class="badge badge-warning">{{$row->brith_date}}</span>
                                </p>
                                <a href="/user/reportDetail?id={{$row->id_biodataChild}}&name={{$row->full_name}}&date=">
                                    <button class="btn btn-info">
                                        Lihat Laporan
                                    </button>
                                </a>
                                <a href=" /user/schedule?id={{$row->id_biodataChild}}">
                                    <button class="btn btn-warning">
                                        Lihat Schedule
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
