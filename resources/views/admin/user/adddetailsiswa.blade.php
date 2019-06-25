@extends('page/app_admin');
@section('content')
<div class="container">
<h3 class="panel-title">
  TambahDetailSiswa
</h3>

<form action="{{Route('insert.siswa')}}" method="post" enctype="multipart/form-data">
@csrf
<img class="profile-pic" style="max-width:200px;max-height:200px;float:left;"  src="http://cdn.cutestpaw.com/wp-content/uploads/2012/07/l-Wittle-puppy-yawning.jpg">
<div class="p-image">
       <i class="fa fa-camera upload-button"></i>
        <input class="file-upload" type="file" accept="image/*" name="image" required/>
     </div>
     <input type="hidden" name="id_user" value="{{$siswa->id}}">
<div class="form-group">
    <label for="name">Nama</label>
    <input  type="text" name="name" class="form-control" value="{{$siswa->name}}" id="name" disabled>
    <input  type="hidden" name="name" class="form-control" value="{{$siswa->name}}" id="name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" value="{{$siswa->email}}" disabled>
  </div>
  <div class="form-group">
    <label for="email">Nomor Induk Siswa</label>
    <input type="number" name="nis" class="form-control" id="nip" value="{{$siswa->nip}}" disabled>
    <input type="hidden" name="nis" class="form-control" id="nip" value="{{$siswa->nip}}">
  </div>
  <div class="form-group">
    <label for="email">Nomor Induk Siswa Nasional</label>
    <input type="number" name="nisn" class="form-control" id="nip" required>
  </div>
  <div class="form-group">
            <label for="id_jurusan">Jenis Kelamin</label>
            <select name="jenis" id="id_jurusan" class="form-control">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            </div>
  <div class="form-group">
    <label for="email">Tempat Lahir</label>
    <input type="text" name="tempat" class="form-control" id="nip">
  </div>
  <div class="form-group">
    <label for="email">Tanggal Lahir</label>
    <input type="date" name="tanggallahir" class="form-control" id="nip">
  </div>
  <div class="form-group">
    <label for="email">Nomor Telepon</label>
    <input type="number" name="telp" class="form-control" id="nip" required>
  </div>
  <div class="form-group">
    <label for="email">Nama Ayah</label>
    <input type="text" name="ayah" class="form-control" id="nip" required>
  </div>
  <div class="form-group">
    <label for="email">Nama ibu</label>
    <input type="text" name="ibu" class="form-control" id="nip" required>
  </div>
  <div class="form-group">
            <label for="id_jurusan">Agama</label>
            <select name="agama" id="id_jurusan" class="form-control">
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="budha">Budha</option>
                <option value="hindu">Hindu</option>
                <option value="konghucu">Konghucu</option>
            </select>
            </div>
  <div class="form-group">
            <label for="id_jurusan">Jurusan</label>
            <select name="id_jurusan" id="id_jurusan" class="form-control">
                @foreach($jurusan as $jurusans)
                    <option value="{{$jurusans->id}}"> {{ $jurusans->nama_jurusan }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="id_jurusan">Kelas</label>

            <select name="id_kelas" id="id_kelas" class="form-control">
            @foreach($kelas as $kelass)
                    <option value="{{$kelass->id}}"> {{ $kelass->nama_kelas }}</option>
                    @endforeach
            </select>

            </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

@endsection
@push('upload')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});

$(".upload-button").on('click', function() {
   $(".file-upload").click();
});
});
</script>
@endpush
