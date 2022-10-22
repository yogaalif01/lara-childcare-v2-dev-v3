@extends('dashboards.users.baru.template')
@section('laporan','active')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@section('isi')
<div id="portfolio" class="our-portfolio section">
        <div class="container">
           <div class="row">
            @foreach($child as $row)
            <div class="col-lg-4">
              <a href="#">
                <div class="">
                  <div class="showed-content">
                    <img src="{{ asset('frontend/assets/images/portfolio-image.png') }}" alt="">
                    <br>
                    <br>
                        <p>{{$row->full_name}}</p>
                        <p>{{$row->brith_date}}</p>
                    <br>
            
                    <a href="{{ url('/user/laporan_detail/'.$row->id_biodataChild) }}" class="btn btn-primary btn-block">Laporan</a>
                  
                  </div>
                </div>
              </a>
            </div>
            @endforeach
        </div>

    </div>
</div>

<div id="contact" class="contact-us section">
    <div class="container">
        <div class="row">
              
             <div class="col-lg-12 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    
                <form id="contact" method="POST" action="{{ url('/registerChild/InputForm') }}">
                    <h3 style="text-align: center">Jadwal Schedule</h3>
                    <br>
                    <div class="row">
              
                    {{-- <div class="col-lg-12" style="">
                             <fieldset>
                                <input type="date" name="full_name" id="name" placeholder="Full Name" autocomplete="on" required>
                            </fieldset>
                    </div> --}}
                    {{-- <div class="col-lg-12" style="text-align: right">
                            <fieldset>
                                <button class="btn btn-success">Cari Berdasarkan Tanggal</button>
                           </fieldset>
                   </div> --}}
                   <br>
                   <br>
                   <br>
                        <table id="myTable" class="display" style="width:100%">
                                <thead>
                                        <tr>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Penilaian: activate to sort column ascending" style="width: 121.906px;">Tema</th>
                                            <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Aktivitas: activate to sort column descending" style="width: 469.594px;">Judul Kegiatan</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Indikator: activate to sort column ascending" style="width: 236.625px;">Tanggal</th>

                                            {{-- <th scope="col" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Tanggal: activate to sort column ascending" style="width: 128.875px;">Jam Pulang</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>  
                                        @foreach ($schedule as $item)
                                        <tr class="odd">
                                        <td class="sorting_1">{{ $item->tema }}</td>
                                                <td>{{ $item->nama_kegiatan }}</td>
                                                <td>{{ $item->date }}</td>
                                        </tr>
                                        @endforeach               
                                     
                                       
                                    </tbody>
                            </table>
                        </div>
                    </form>
            </div>
        </div>
     </div>   
</div>

           

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable( {
        paging: false,           
        "searching": false,    
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endsection