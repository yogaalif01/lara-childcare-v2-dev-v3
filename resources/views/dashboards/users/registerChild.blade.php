@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Register Child')

@section('content')

    <div class="p-3">
        <h1>Daftarkan Anak Anda!</h1>
        <form id="formIndividu" class="d-flex justify-between" method="post" action="/registerChild/InputForm">
            @csrf
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nickname</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Birth Date</label>
                            <input type="date" class="form-control" id="brith_date" name="brith_date" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Birth Place</label>
                            <input type="text" class="form-control" id="brith_place" name="brith_place" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Child Siblings</label>
                            <input type="number" class="form-control" id="child_siblings" name="child_siblings" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Child Siblings of</label>
                            <input type="number" class="form-control" id="child_siblings_of" name="child_siblings_of" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Child Outside Activity</label>
                            <textarea id="child_outside_activity" name="child_outside_activity" cols="30" rows="3" class="form-control">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Religion</label>
                            <select name="religion" class="form-control" id="religion">
                                <option value="Islam">Islam</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Buang Air Kecil</label>
                            <input type="text" class="form-control" id="bak" name="bak" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Buang Air Besar</label>
                            <input type="text" class="form-control" id="bab" name="bab" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sikat Gigi</label>
                            <input type="text" class="form-control" id="toothBrush" name="toothBrush" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Makan</label>
                            <input type="text" class="form-control" id="eat" name="eat" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Minum Susu</label>
                            <input type="text" class="form-control" id="drinkingMilk" name="drinkingMilk" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Menangis</label>
                            <input type="text" class="form-control" id="crying" name="crying" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bermain</label>
                            <input type="text" class="form-control" id="play" name="play" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sleep</label>
                            <input type="text" class="form-control" id="sleep" name="sleep" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Note</label>
                            <input type="text" class="form-control" id="etc" name="etc" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prenatal</label>
                            <input type="text" class="form-control" id="prenatal" name="prenatal" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Partus</label>
                            <input type="text" class="form-control" id="partus" name="partus" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Natal</label>
                            <input type="text" class="form-control" id="post_natal" name="post_natal" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Motoric Skill</label>
                            <input type="text" class="form-control" id="motoric_skill" name="motoric_skill" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Languange Skill</label>
                            <input type="text" class="form-control" id="language_skill" name="language_skill" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Health History</label>
                            <input type="text" class="form-control" id="health_history" name="health_history" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>

        <h1 class="mt-3">Akun yang telah didaftarkan</h1>
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
            @foreach($biodataChild as $row)
                <tr>
                    <td>{{$row->full_name}}</td>
                    <td>{{$row->nickname}}</td>
                    <td>{{$row->brith_place}}</td>
                    <td>{{$row->brith_date}}</td>
                    <td>{{$row->gender}}</td>
                    <td>Anak ke {{$row->child_siblings}} dari {{$row->child_siblings_of}}</td>
                    <td>{{$row->child_outside_activity}}</td>
                    <td>{{$row->religion}}</td>        
                    @if(strpos($param, $row->id_biodataChild) !== false)
                        <td>
                            <button type="submit" class="btn btn-secondary" disabled>
                                Proses
                            </button>
                        </td>
                    @else
                        <td>
                            <form action="registerChild/Entrusted" method="post">
                                @csrf
                                <input type="hidden" name="id_child" id="id_child" value="{{$row->id_biodataChild}}">
                                <button type="submit" class="btn btn-primary">
                                    Ajukan
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
