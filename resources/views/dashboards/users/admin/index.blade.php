@extends('dashboards.users.admin.template')
@section('dashboard','active')
@section('header')
    <h1>Selamat Datang User {{ session()->get('nama') }} </h1>
    <br>

@endsection
@section('isi')
   <div class="row">
        <div class="col-md-8">
                <div class="nav-tabs-custom ">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Profil Diri</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form class="form-horizontal" method="POST" action="{{ route('adminUpdateInfo') }}" >
                            <div class="form-group">
                              <label for="inputName" class="col-sm-3 ">Nama Ayah</label>
          
                              <div class="col-sm-9">
                              <input type="text" name="name" class="form-control" id="inputName" value="{{ $cekbioparent->father_name }}" placeholder="Name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail" class="col-sm-3 ">Nama Ibu</label>
          
                              <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Data Masih Kosong" value="{{ $cekbioparent->mother_name }}">
                              </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputEmail" class="col-sm-3 ">Alamat Rumah</label>
                
                                    <div class="col-sm-9">
                                      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Data Masih Kosong" value="{{ $cekbioparent->address }}">
                                    </div>
                             </div>
                       
                             <div class="form-group">
                                    <label for="inputEmail" class="col-sm-3">No Telp Rumah</label>
                
                                    <div class="col-sm-9">
                                      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Data Masih Kosong" value="{{ $cekbioparent->phone_number }}">
                                    </div>
                             </div>
                             <div class="form-group">
                                    <label for="inputEmail" class="col-sm-3 ">Alamat Kantor</label>
                
                                    <div class="col-sm-9">
                                      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Data Masih Kosong" value="{{ $cekbioparent->office_address }}">
                                    </div>
                             </div>
                             <div class="form-group">
                                    <label for="inputEmail" class="col-sm-3">Nomor Telpon Lain</label>
                
                                    <div class="col-sm-9">
                                      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Data Masih Kosong" value="{{ $cekbioparent->office_phone_number }}">
                                    </div>
                             </div>
                             <div class="form-group">
                              <label for="inputEmail" class="col-sm-3">Email</label>
          
                              <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Data Masih Kosong" value="{{ $cekbioparent->email }}">
                              </div>
                       </div>
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Nama Paket</th>
                                <th>Tanggal Mulai</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($cekpaket as $item)
                              <tr>
                                <td> {{ $item->nama_paket }} </td>
                                <td> {{ $item->keterangan_paket }} </td>
                              </tr>
                              @endforeach
                             
                            </tbody>
                          </table>
                            
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-danger btn-block">Update Profil</button>
                              </div>
                            </div>
                          </form>
                    </div>
                    {{-- identitas --}}
                
                  </div>
                  <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
              </div>
    </div> 
@endsection