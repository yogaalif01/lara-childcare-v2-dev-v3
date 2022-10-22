@extends('dashboards.users.admin.template')
@section('danak','active')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('isi')
<div class="row">
           
        <div class="col-md-12">
                <div class="nav-tabs-custom ">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Profil Anak</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Identitas Anak</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Kebiasaan sehari hari Toilet Traning</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form class="form-horizontal" method="POST" action="{{ url('/user/updateanak/'.$data->id_biodataChild) }}" >
                           @csrf
                            <div class="form-group">
                              <label for="inputName" class="col-sm-3 ">Nama Lengkap</label>
          
                              <div class="col-sm-9">
                              <input type="text" name="full_name" class="form-control" id="inputName" value=" {{ $data->full_name }} " placeholder="Name">
                              </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputName" class="col-sm-3 ">Nick Name</label>
                
                                    <div class="col-sm-9">
                                    <input type="text" name="nickname" class="form-control" id="inputName" value=" {{ $data->nickname }} " placeholder="Name">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputName" class="col-sm-3 ">Birth Date</label>
                
                                    <div class="col-sm-9">
                                    <input type="date" name="brith_date" class="form-control" id="inputName" value="{{ $data->brith_date }}" placeholder="Name">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputName" class="col-sm-3 ">Birth Place</label>
                
                                    <div class="col-sm-9">
                                    <input type="text" name="brith_place" class="form-control" id="inputName" value=" {{ $data->brith_place }} " placeholder="Name">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputName" class="col-sm-3 ">Gender</label>
                
                                    <div class="col-sm-9">
                                        <select name="gender" id="" class="form-control">
                                            <option value="">Pilih salah Satu</option>
                                            <option value="Pria" {{ $data->gender == "Pria" ? 'selected' : '' }} >Pria</option>
                                            <option value="Wanita" {{ $data->gender == "Wanita" ? 'selected' : '' }}>Wanita</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputName" class="col-sm-3 ">child_siblings</label>
                
                                    <div class="col-sm-9">
                                    <input type="text" name="child_siblings" class="form-control" id="inputName" value="{{ $data->child_siblings }} " placeholder="Name">
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label for="inputName" class="col-sm-3 ">child_siblings_of</label>
                
                                    <div class="col-sm-9">
                                    <input type="text" name="child_siblings_of" class="form-control" id="inputName" value="{{ $data->child_siblings_of }} " placeholder="Name">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputName" class="col-sm-3 ">child_outside_activity</label>
                
                                    <div class="col-sm-9">
                                    <input type="text" name="child_outside_activity" class="form-control" id="inputName" value=" {{ $data->child_outside_activity }} " placeholder="Name">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputName" class="col-sm-3 ">Religion</label>
                
                                    <div class="col-sm-9">
                                        <select name="religion" id="" class="form-control">
                                            <option value=""> Pilih salah satu agama </option>
                                            <option value="Islam" {{ $data->religion == "Islam" ? 'selected' : '' }}> Islam </option>
                                            <option value="Katholik" {{ $data->religion == "Katholik" ? 'selected' : '' }} > Katholik </option>
                                            <option value="Kristen" {{ $data->religion == "Kristen" ? 'selected' : '' }}> Kristen </option>
                                            <option value="Hindu" {{ $data->religion == "Hindu" ? 'selected' : '' }}> Hindu </option>
                                            <option value="Budha" {{ $data->religion == "Budha" ? 'selected' : '' }}> Budha </option>
                                            <option value="Konghucu" {{ $data->religion == "Konghucu" ? 'selected' : '' }}> Konghucu </option>
                                        </select>
                                    </div>
                            </div>
                          
                        
                         
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" id="update" class="btn btn-danger btn-block">Update Profil</button>
                              </div>
                            </div>
                          </form>
                    </div>

                    <div class="tab-pane" id="tab_2">
                        <form class="form-horizontal" method="POST" action="{{ url('/user/updateanak/'.$data->id_biodataChild) }}" >
                                @csrf
                                 <div class="form-group">
                                   <label for="inputName" class="col-sm-3 ">Masa Prenetal</label>
               
                                   <div class="col-sm-9">
                                         <input type="text" name="prenatal" class="form-control" id="inputName" value=" {{ $data->prenatal }} " placeholder="Pranetal Masih Kosong">
                                   </div>
                                 </div>
                                 <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Masa Partus</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="partus" class="form-control" id="inputName" value=" {{ $data->partus }} " placeholder="Partus Masih Kosong ">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Masa Post Natal</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="post_natal" class="form-control" id="inputName" value=" {{ $data->post_natal }} " placeholder="Post natal Masih Kosong">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Kemampuan Motorik Saat ini</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="motoric_skill" class="form-control" id="inputName" value=" {{ $data->motoric_skill }} " placeholder="Kemampuan Motoric Masih Kosong">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Kemampuan Bahasa Saat ini</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="language_skill" class="form-control" id="inputName" value=" {{ $data->language_skill }} " placeholder="Kemampuan Bahasa Masih Kosong">
                                        </div>
                                </div> 
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Riwayat Kesehatan</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="health_history" class="form-control" id="inputName" value=" {{ $data->health_history }} " placeholder="Riwayat Kesehatan">
                                        </div>
                                </div>                                 
                                 <div class="form-group">
                                   <div class="col-sm-offset-3 col-sm-9">
                                     <button type="submit" id="update" class="btn btn-danger btn-block">Update Profil</button>
                                   </div>
                                 </div>
                               </form>
                      </div>

                      <div class="tab-pane" id="tab_3">
                        <form class="form-horizontal" method="POST" action="{{ url('/user/updateanak/'.$data->id_biodataChild) }}" >
                                @csrf
                                 <div class="form-group">
                                   <label for="inputName" class="col-sm-3 ">Buang Air Besar</label>
               
                                   <div class="col-sm-9">
                                         <input type="text" name="bab" class="form-control" id="inputName" value=" {{ $data->bab }} " placeholder="BAB Masih Kosong">
                                   </div>
                                 </div>
                                 <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Buang Air Kecil</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="bak" class="form-control" id="inputName" value=" {{ $data->bak }} " placeholder="BAK Masih Kosong">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Mandi</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="prenatal" class="form-control" id="inputName" placeholder="Mandi Belum Ada">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Gosok Gigi</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="toothBrush" class="form-control" id="inputName" value=" {{ $data->toothBrush }} " placeholder="Gosok Gigi Masih Kosong">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Makan</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="eat" class="form-control" id="inputName" value=" {{ $data->eat }} " placeholder="Makan Masih Kosong">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Minum Susu</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="drinkingMilk" class="form-control" id="inputName" value=" {{ $data->drinkingMilk }} " placeholder="Minum Susu Masih Kosong">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Saat Menangis</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="crying" class="form-control" id="inputName" value=" {{ $data->crying }} " placeholder="Menangis Masih Kosong">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Saat Bermain</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="play" class="form-control" id="inputName" value=" {{ $data->play }} " placeholder="Bermain Masih Kosong">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Tidur</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="sleep" class="form-control" id="inputName" value=" {{ $data->sleep }} " placeholder="Tidur Masih Kosong">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="col-sm-3 ">Note</label>
                    
                                        <div class="col-sm-9">
                                              <input type="text" name="etc" class="form-control" id="inputName" value=" {{ $data->etc }} " placeholder="Note Masih Kosong">
                                        </div>
                                </div>
                                  
                                 <div class="form-group">
                                   <div class="col-sm-offset-3 col-sm-9">
                                     <button type="submit" id="update" class="btn btn-danger btn-block">Update Profil</button>
                                   </div>
                                 </div>
                               </form>
                      </div>
                
                  </div>
                  <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
              </div>
    </div> 

@endsection
@section('js')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
</script>
@endsection