@extends('layouts.default')
@foreach ($userprofil as $u)

@section('content')


<div class="header">
    <h1 class="text-center p-5">CRUD LARAVEL</h1>
</div>
<div class="card">
    <div class="card-header">
        Edit User Profile
    </div>
    <div class="card-body">
        <form action="{{route('userprofil.update', $u->id)}}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{$u ->id}}">
            <input name="ui" type="hidden" value="{{$u ->users_id}}">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input name="nl" value="{{$u ->nl}}" type="text" class="form-control @error ('nl') is-invalid @enderror"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                @error ('nl')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input id="birthday" name="tgl" onchange="getAge()" class="datepicker" width="100%"
                    value="{{$u->tgl}}" />
            </div>
            <div class="form-check form-check-inline mt-3 mb-3">
                <label for="exampleInputEmail1">Jenis Kelamin :</label>
                <input class="form-check-input ml-2" style="margin-bottom:3px" type="radio" name="jk" id="inlineRadio1"
                    value="Laki-Laki" {{$u->jk == 'Laki-Laki' ? 'checked':''}} required>
                <label class="form-check-label " style="margin-bottom:3px" for="inlineRadio1">Laki - Laki</label>
                <input class="form-check-input ml-2" style="margin-bottom:3px" type="radio" name="jk" id="inlineRadio2"
                    value="Perempuan" {{$u->jk == 'Perempuan' ? 'checked':''}} required>
                <label class="form-check-label" style="margin-bottom:3px" for="inlineRadio1">Perempuan</label>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Agama</label>
                <select name="agama" class="form-control" id="exampleFormControlSelect1" required>

                    <option value="Islam" {{$u->agama == 'Islam' ? 'selected':''}}>Islam</option>
                    <option value="Hindu" {{$u->agama == 'Hindu' ? 'selected':''}}>Hindu</option>
                    <option value="Buddha" {{$u->agama == 'Buddha' ? 'selected':''}}>Buddha</option>
                    <option value="Protestan" {{$u->agama == 'Protestan' ? 'selected':''}}>Protestan</option>
                    <option value="Katolik" {{$u->agama == 'Katolik' ? 'selected':''}}>Katolik</option>
                    <option value="Konghucu" {{$u->agama == 'Konghucu' ? 'selected':''}}>Konghucu</option>
                    <option value="Lainnya" {{$u->agama == 'Lainnya' ? 'selected':''}}>Aliran Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" value="{{$u ->email}}" type="text"
                    class="form-control @error ('email') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error ('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Umur</label>
                <input id="result" name="umur" value="{{$u ->umur}}" type="number" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endforeach
@endsection
@section('script')
<script>
    function getAge() {
var date = document.getElementById('birthday').value;

if(date === ""){
alert("Please complete the required field!");
}else{
var today = new Date();
var birthday = new Date(date);
var year = 0;
if (today.getMonth() < birthday.getMonth()) { year=1; } else if ((today.getMonth()==birthday.getMonth()) &&
    today.getDate() < birthday.getDate()) { year=1; } var age=today.getFullYear() - birthday.getFullYear() - year;
    if(age < 0){ age=0; }
    var umur = document.getElementById('result')
    umur.value = age } }
</script>
<script>
    $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            autoclose: true,
            startDate: 'd',
            format : ('yyyy-mm-dd'),
            formatDate : ('dd-mm-yyyy')
        });
</script>
@endsection
