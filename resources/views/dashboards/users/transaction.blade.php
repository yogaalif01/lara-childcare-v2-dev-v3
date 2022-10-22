@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Transaction')

@section('content')

    <div class="p-3">
        <h1>Lakukan Pembayaran</h1>

        <div class="row">
            @foreach($goTransaction as $row)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4><span class="badge badge-info">{{$row->full_name}}</span></h4>
                            <h5 class="card-title font-weight-bolder">{{$row->date}}</h5>
                        </div>
                        <p class="card-text">Jumlah yang harus dibayarkan: <b>Rp. {{$row->nominal}}</b></p>
                        <div class="alert alert-warning" role="alert">
                            <p class="card-text">Lakukan pembayaran pada nomer rekening ini:</p>
                            <b>Mandiri:</b>
                            <div class="d-flex justify-content-between">
                                <b>Devina Nadya Ayu Pramita</b>
                                <b>123XXXXXXX</b>
                            </div>
                        </div>
                        <a href="#" class="card-link">Upload Bukti Pembayaran</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
