@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Dashboard')
@push('css')
<style>
    .header-homepage {background: #C6FFDD; padding: 20px 40px;}
    .header-homepage h1 {color: #0A612D; font-weight: 700;}
    .btn.btn-primary {background: #C6FFDD !important; border: 0; color: #0A612D; font-weight: 700;}
    .btn.btn-primary:hover {background: #0A612D !important; border: 0; color: #FFF; font-weight: 700;}
    .card h5 {color: #0A612D; font-weight: 700;}
    .card p {color: #B1B1B1;}
    .card {overflow: hidden; width: 100% !important;}
    .card img {height: 200px; object-fit: cover;}
    .title {font-weight: 700; color: #0A612D; font-size: 30px;}
    .desc-title {font-weight: 400; color: #B1B1B1; font-size: 20px;}
</style>
@endpush
@section('content')
<div class="d-flex justify-content-between align-items-center header-homepage">
    <div>
        <h1>Buah hati yang pintar adalah dambaan semua orang tua!</h1>
    </div>
    <img src="https://i.ibb.co/Nrm8ckJ/header-img.png" width="500" alt="">
</div>
<div class="mt-4">
    <h1 class="title">Kenapa harus kita?</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1515548212260-ac87067b15ab?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Harga</h5>
                    <p class="card-text">Harga terjangkau, dengan kualitas yang terjamin dan berkualitas.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1600880291298-8481039492bc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pelayanan</h5>
                    <p class="card-text">Pelayanan terjamin, pelayanan dengan orang-orang profesional.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1633107603612-8c96893c1e8e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Metode Pembelajaran</h5>
                    <p class="card-text">Menggunakan metode pembelajaran terbaru dengan mengikuti perkembangan jaman.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex align-items-center mt-4">
    <img class="mr-4" src="https://i.ibb.co/VmqQq2j/Group-3403.png" width="300" alt="">
    <div class="ml-4">
        <h1 class="title">Daftarkan anak anda segera!</h1>
        <p class="desc-title">Tunggu apalagi? Segera daftarkan anak anda melalui form dengan mengklik tombol dibawah ini! Jadikan anak anda seseorang yang berkompeten dalam segala hal. Sigap, tanggap dan cepat.</p>
        <a href="/user/registerChild" class="btn btn-primary">Daftar Sekarang</a>
    </div>
</div>
@endsection
