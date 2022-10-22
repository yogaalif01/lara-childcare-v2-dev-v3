@extends('dashboards.users.baru.template')
@section('daftar','active')
@section('css')
    
@endsection
@section('isi')
        
     <div id="contact" class="contact-us section">
        <div class="container">
         <div class="row">
                @if ($message = Session::get('sukses'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert" id="test">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif
             <div class="col-lg-12 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                 
                <form id="contact" method="POST" action="{{ url('/registerChild/InputForm') }}">
                    @csrf
                        <h2>Pendaftaran Anak  </h2>
                    <br>
                <div class="row">
                    <div class="col-lg-6">
                    <fieldset>
                        <input type="name" name="full_name" id="name" placeholder="Full Name" autocomplete="on" required>
                    </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset>
                            <input type="date" name="brith_date" id="name" placeholder="Tanggal Lahir" autocomplete="on" required>
                        </fieldset>
                    </div>
                    {{-- <div class="col-lg-6">
                    <fieldset>
                        <input type="surname" name="nickname" id="surname" placeholder="Nicnkname" autocomplete="on" required>
                    </fieldset>
                    </div> --}}
                    {{-- <div class="col-lg-6">
                        <fieldset>
                            <input type="surname" name="usia" id="usia" placeholder="Usia" autocomplete="on" required>
                        </fieldset>
                        </div> --}}
                  
                    <div class="col-lg-6">
                        <fieldset>
                            <select name="gender" id="" class="form-control" style="background-color: #d1f3ff;   border-radius: 33px; ">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria </option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </fieldset>
                    </div>
                    {{-- <div class="col-lg-6">
                        <fieldset>
                            <input type="name" name="brith_place" id="name" placeholder="Birth Place" autocomplete="on" required>
                        </fieldset>
                        </div> --}}
                        {{-- <div class="col-lg-6">
                                <fieldset>
                                        <select name="religion" id="" class="form-control" style="background-color: #d1f3ff;   border-radius: 33px; ">
                                            <option value="">Region</option>
                                            <option value="Islam">Islam </option>
                                            <option value="Katholik">Katholik </option>
                                            <option value="Protestan">Protestan </option>
                                            <option value="Hindu">Hindu </option>
                                            <option value="Budha">Budha </option>
                                            <option value="Konghucu">Konghucu </option>
                                        </select>
                                    </fieldset>
                    </div> --}}
                    {{-- <div class="col-lg-6">
                            <fieldset>
                                <input type="number" name="child_siblings" id="name" placeholder="Child Siblings" autocomplete="on" required>
                            </fieldset>
                    </div>
                   <div class="col-lg-6">
                            <fieldset>
                                <input type="number" name="child_siblings_of" id="surname" placeholder="Child Siblings of" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <hr>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="bak" id="name" placeholder="Buang Air Kecil" autocomplete="on" required>
                            </fieldset>
                    </div>
                   <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="bab" id="surname" placeholder="Buang Air Besar" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="crying" id="name" placeholder="Menangis" autocomplete="on" required>
                            </fieldset>
                    </div>
                   <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="play" id="surname" placeholder="Bermain" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="toothBrush" id="name" placeholder="Sikat Gigi" autocomplete="on" required>
                            </fieldset>
                    </div>
                   <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="sleep" id="surname" placeholder="Sleep" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="eat" id="name" placeholder="Makan" autocomplete="on" required>
                            </fieldset>
                    </div>
                   <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="drinkingMilk" id="surname" placeholder="Minum susu" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="etc" id="surname" placeholder="Note" autocomplete="on" required>
                            </fieldset>
                     </div> --}}
                     {{-- <hr>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="prenatal" id="surname" placeholder="Prenatal" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="motoric_skill" id="surname" placeholder="Motoric Skill" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="partus" id="surname" placeholder="Partus" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="language_skill" id="surname" placeholder="Languange Skill" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="post_natal" id="surname" placeholder="Post Natal" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="health_history" id="surname" placeholder="Health History" autocomplete="on" required>
                            </fieldset>
                     </div>
                     <div class="col-lg-12">
                            <fieldset>
                                <textarea name="child_outside_activity" type="text" class="form-control" id="message" placeholder="Child Outside Activity" required=""></textarea>  
                            </fieldset>
                    </div> --}}
                    <div class="col-lg-6">
                        <fieldset>
                            <select name="paket" id="paket" class="form-control" style="background-color: #d1f3ff;   border-radius: 33px; ">
                                <option value="">Pilih Paket</option>
                                @foreach ($paket as $item)
                                <option value="{{ $item->idpaket }}"> {{ $item->nama_paket }} </option>
                                @endforeach
                            </select>
                        </fieldset>
                 </div>
                 <br>
                 <br>
                 <div class="col-lg-12">
                    <label for="username">Harga Paket</label>
                    <fieldset>
                        <input readonly type="text" name="nominal" id="harga" placeholder="Harga Paket" autocomplete="on" required>
                    </fieldset>
             </div>
             <div class="col-lg-6">
                    <div class="form-group" id="tawalbulan">
                            <label for="username">Pilih Tanggal Awal</label>
                            <input type="date" class="form-control" name="nmawalbln">
                            
                        </div> 
             </div>
             <div class="col-lg-6">
                    <div class="form-group" id="takhirbulan">
                            <label for="username">Pilih Tanggal Akhir</label>
                            <input type="date" class="form-control" name="nmawalakhir">
                            
                        </div> 
             </div>

             <div class="col-lg-6">
                    <div class="form-group" id="tawalminggu">
                            <label for="username">Pilih Tanggal Awal</label>
                            <input type="date" class="form-control" name="nmawalmg">
                            
                        </div> 
             </div>
             <div class="col-lg-6">
                    <div class="form-group" id="takhirminggu">
                            <label for="username">Pilih Tanggal Akhir</label>
                            <input type="date" class="form-control" name="nmakhirmg">
                            
                        </div> 
             </div>
             <div class="col-lg-6">
                    <div class="form-group" id="harian1">
                            <label for="username">Jumlah Hari</label>      
                            <input type="text" id="jmlhri" value="1" readonly>
                            <button type="button" id="btnplus">+</button>
                            <button type="button" id="btnminus">-</button>
                     </div> 
             </div>
             <div class="col-lg-6">
                    <div class="form-group" id="harian">
                            <label for="username">Pilih Hari Apa Saja</label>
                            <textarea class="form-control" name="nmhari" id="" cols="30" rows="10">

                            </textarea>
                            
                        </div> 
             </div>
            
             <div class="col-lg-12">
                    <fieldset>
                        <p style="text-align: center">Biaya Tambahan :</p>
                        <table class="table table-bordered" style="font-family: Arial, Helvetica, sans-serif">
                            <thead>
                                    <tr>
                                          <th style="width: 50%">Biaya</th>
                                          <th style="width: 50%">Harga</th>   
                                    </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Administrasi</td>
                                    <td>250.000</td>
                                </tr>
                                <tr>
                                    <td>Uang Pengembangan</td>
                                    <td>1.000.000</td>
                                </tr>
                                <tr>
                                    <td>Seragam TPA</td>
                                    <td>150.000</td>
                                </tr>
                                <tr>
                                    <td>Piyama Anak</td>
                                    <td>125.000</td>
                                </tr>
                                <tr>
                                    <td>Total Biaya Tambahan</td>
                                    <td>1.525.000</td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <p style="font-family: Arial, Helvetica, sans-serif; font-weight: bold ">Biaya Tambahan :</p>
                        <p>Administrasi : 250.000</p>
                        <p>Uang Pengembangan : 1.000.000</p>
                        <p>Seragam TPA : 150.000</p>
                        <p>Piyama Anak : 125.000</p>
                        <p>Total Biaya Tambahan :1.525.000 </p> --}}
                    </fieldset>
             </div>
          
   
                  
             <div class="col-lg-12">
                <fieldset>
                    <input type="text" id="total1" name="total1">
                   <h2>Total Harga : <span id="total"></span></h2>
                </fieldset>
         </div>
               {{-- <div class="col-lg-12">
                    <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                    </fieldset>
                    </div> --}}
                    
                    <div class="col-lg-12">
                    <fieldset>
                        <button type="submit" id="form-submit" class="main-button" style="  padding: 14px 490px;">Submit</button>
                    </fieldset>
                    </div>
                </div>
                <div class="contact-dec">
                    <img src="assets/images/contact-decoration.png" alt="">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
      $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });
</script>
    <script>
    $(document).ready(function(){
        document.getElementById("harian").hidden = true;
        document.getElementById("harian1").hidden = true;
        document.getElementById("tawalbulan").hidden = true;
        document.getElementById("takhirbulan").hidden = true;
        document.getElementById("tawalminggu").hidden = true;
        document.getElementById("takhirminggu").hidden = true;
		$("#paket").on('change',function(){
            
            if (this.value == 1) {
                document.getElementById("harian1").hidden = true;
                document.getElementById("harian").hidden = true;
                document.getElementById("tawalminggu").hidden = true;
                document.getElementById("takhirminggu").hidden = true;
				document.getElementById("tawalbulan").hidden = false;
                document.getElementById("takhirbulan").hidden = false;
			}
            if (this.value == 2) {
                document.getElementById("tawalbulan").hidden = true;
                document.getElementById("takhirbulan").hidden = true;
                document.getElementById("harian").hidden = true;
                document.getElementById("harian1").hidden = true;
                document.getElementById("tawalminggu").hidden = false;
                document.getElementById("takhirminggu").hidden = false;
            }
            if (this.value == 3) {
		        document.getElementById("harian").hidden = false;
                document.getElementById("harian1").hidden = false;
                document.getElementById("tawalbulan").hidden = true;
                document.getElementById("takhirbulan").hidden = true;
                document.getElementById("tawalminggu").hidden = true;
                document.getElementById("takhirminggu").hidden = true;
             }

            $.ajax({
            url : "{{ url('/user/cekhargapaket') }}"+"/"+this.value,
            type:"GET",
            success:function(data) {
              var data = JSON.parse(data);
              console.log(data);
              $('#harga').val(data['data']['harga'] );
              $('#total').html(data['data']['harga'] + 1525000 );
              $('#total1').val( data['data']['harga'] + 1525000);
            },
            error:function(data) {
              console.log(data);
            }
        });
			
		});
        
        $('#jmlhri').on('change', function () {
            var harga = $('#harga').val();
            var value = $('#jmlhri').val();
            var total = parseInt(harga) + parseInt(150000);
            $('#harga').val(total);
            $('#total').html(total);
            
             
           
        });
        $('#btnplus').click(function() {
            var total = $('#total1').val();
            var jmlhri = $('#jmlhri').val();
            var tambah = parseInt(jmlhri) + 1;
            var tot_biaya = parseInt(total) + 150000;
            $('#jmlhri').val(tambah);
            $('#total1').val(tot_biaya);
            $('#total').html(tot_biaya);
            

        });
        $('#btnminus').click(function() {
           var total = $('#total1').val();
           var jmlhri = $('#jmlhri').val();
          
           var minus = parseInt(jmlhri) - 1;
           if (minus < 1) {
               alert("Tidak Boleh Lebih dari 1");
               $('#jmlhri').val(1);
           }
           else {
            var tot_biaya = parseInt(total) - 150000;
            $('#jmlhri').val(minus);
            $('#total1').val(tot_biaya);
            $('#total').html(tot_biaya);
           }
          

       });

	});
    </script>
@endsection