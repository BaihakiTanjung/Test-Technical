@extends('layouts.default')

@section('content')
<div class="header">
  <h1 class="text-center p-5">CRUD LARAVEL</h1>
</div>
<div class="card">
  <div class="card-header">
    Tambah User Profile
  </div>

  <div class="card-body">
    <form action="{{route('userprofil.store')}}" method="POST">
      @csrf
      <input name="ui" type="hidden" value="{{Auth::user()->id}}">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Lengkap</label>
        <input name="nl" type="text" class="form-control @error ('nl') is-invalid @enderror"
          aria-describedby="emailHelp">
        @error ('nl')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tanggal Lahir</label>
        <input id="birthday" name="tgl" onchange="getAge()" class="datepicker" width="100%"
          value="{{date("d/m/yy")}}" />
      </div>
      <div class="form-check form-check-inline mt-3 mb-3 @error ('jk') is-invalid @enderror"">
                <label for=" exampleInputEmail1">Jenis Kelamin :</label>
        <input class="form-check-input ml-2" style="margin-bottom:3px" type="radio" name="jk" id="inlineRadio1"
          value="Laki-Laki" required>
        <label class="form-check-label " style="margin-bottom:3px" for="inlineRadio1">Laki - Laki</label>
        <input class="form-check-input ml-2" style="margin-bottom:3px" type="radio" name="jk" id="inlineRadio2"
          value="Perempuan" required>
        <label class="form-check-label" style="margin-bottom:3px" for="inlineRadio1">Perempuan</label>
        @error ('jk')
        <div class="invalid-feedback">More example invalid feedback text</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Agama</label>
        <select name="agama" class="form-control @error ('agama') is-invalid @enderror"" id=" exampleFormControlSelect1"
          required>
          <option>--Select--</option>
          <option value="Islam">Islam</option>
          <option value="Hindu">Hindu</option>
          <option value="Buddha">Buddha</option>
          <option value="Protestan">Protestan</option>
          <option value="Katolik">Katolik</option>
          <option value="Konghucu">Konghucu</option>
          <option value="Lainnya">Aliran Lainnya</option>
        </select>
        @error ('agama')
        <div class="invalid-feedback">Example invalid custom select feedback</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="email" type="text" class="form-control @error ('email') is-invalid @enderror""
                    id=" exampleInputEmail100" aria-describedby="emailHelp">
        @error ('email')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Umur</label>
        <input id="result" name="umur" type="number" class="form-control" id="exampleInputEmail1000"
          aria-describedby="emailHelp" readonly>
      </div>
      <button id="tombol" onclick="ubahTanggal()" type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
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
if (today.getMonth() < birthday.getMonth())
{ year=1; } else if ((today.getMonth()==birthday.getMonth()) &&
    today.getDate() < birthday.getDate()) { year=1; }
    var age=today.getFullYear() - birthday.getFullYear() - year;
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
