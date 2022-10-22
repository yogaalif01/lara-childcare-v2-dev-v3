@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Payment')

@section('content')

    <div class="p-3">
        <h1>Lakukan Pembayaran</h1>
            <div class="col-md-12 mt-3" style="background: #86A8E7; padding: 30px; border-radius: 10px;">
                <div class="row">
                @foreach($payment as $row)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Ayah</label>
                            <h3>{{$row->father_name}}</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Ibu</label>
                            <h3>{{$row->mother_name}}</h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Anak</label>
                            <h3>{{$row->full_name}}</h3>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nominal Pembayaran</label>
                            <h3>Rp. {{$row->nominal}}</h3>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <form action="payment/uploadTf" method="post"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{$row->id_transaction}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Upload Bukti Pembayaran</label>
                                <!-- <input type="file" name="image" id="image" value="" > -->
                                <input type="file" value="" name="image" class="form-control" id="image" placeholder="File Sertifikat">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Bukti Pembayaran</button>
                        </form>
                    </div>
                @endforeach
                </div>
            </div>
    </div>

@endsection
