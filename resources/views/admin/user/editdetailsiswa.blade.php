@extends('page/app_admin');
@section('content')
<div class="container">
<h3 class="panel-title">
  Edit Detail Siswa
</h3>
<form action="{{Route('edit.siswa', $siswa->id)}}" method="post" enctype="multipart/form-data">
@csrf
<div class="p-image">
<input type="hidden" name="name_image" value="{{$siswa->foto}}">
<img class="profile-pic" style="max-width:200px;max-height:200px;"  src="{{url('siswa', $siswa->foto)}}">
       <i class="fa fa-camera upload-button"></i>
        <input class="file-upload" type="file" accept="image/*" name="image"/>
     </div>
<div class="form-group">
    <label for="name">Nama</label>
    <input  type="text" name="name" class="form-control" value="{{$siswa->nama}}" id="name" >
  </div>
  <div class="form-group">
    <label for="email">Nomor Induk Siswa</label>
    <input type="number" name="nis" class="form-control" id="nip" value="{{$siswa->NIS}}" >
  </div>
  <div class="form-group">
    <label for="email">Nomor Induk Siswa Nasional</label>
    <input type="number" name="nisn" class="form-control" value="{{$siswa->NISN}}" id="nip">
  </div>
  <div class="form-group">
            <label for="id_jurusan">Jenis Kelamin</label>
            <select name="jenis" id="id_jurusan" class="form-control">
            @if($siswa->jenis_kelamin == "Perempuan")
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan" selected="selected">Perempuan</option>
            @else
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            @endif
            </select>
            </div>
  <div class="form-group">
    <label for="email">Tempat Lahir</label>
    <input type="text" name="tempat" class="form-control" value="{{$siswa->tempat_lahir}}" id="nip">
  </div>
  <div class="form-group">
    <label for="email">Tanggal Lahir</label>
    <input type="date" name="tanggallahir" value="{{$siswa->tanggal_lahir}}" class="form-control" id="nip">
  </div>
  <div class="form-group">
    <label for="email">Nomor Telepon</label>
    <input type="number" name="telp" value="{{$siswa->no_telepon}}" class="form-control" id="nip">
  </div>
  <div class="form-group">
    <label for="email">Nama Ayah</label>
    <input type="text" name="ayah" value="{{$siswa->ayah}}" class="form-control" id="nip">
  </div>
  <div class="form-group">
    <label for="email">Nama ibu</label>
    <input type="text" name="ibu" value="{{$siswa->ibu}}" class="form-control" id="nip">
  </div>
  <div class="form-group">
            <label for="id_jurusan">Agama</label>
            <select name="agama" id="id_jurusan" class="form-control">
                @if($siswa->agama == "kristen")
                <option value="islam">Islam</option>
                <option value="kristen" selected="selected">Kristen</option>
                <option value="budha">Budha</option>
                <option value="hindu">Hindu</option>
                <option value="konghucu">Konghucu</option>
                @elseif($siswa->agama == "budha")
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="budha" selected="selected">Budha</option>
                <option value="hindu">Hindu</option>
                <option value="konghucu">Konghucu</option>
                @elseif($siswa->agama == "hindu")
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="budha">Budha</option>
                <option value="hindu" selected="selected">Hindu</option>
                <option value="konghucu">Konghucu</option>
                @elseif($siswa->agama == "konghucu")
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="budha">Budha</option>
                <option value="hindu">Hindu</option>
                <option value="konghucu" selected="selected">Konghucu</option>
                @else
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="budha">Budha</option>
                <option value="hindu">Hindu</option>
                <option value="konghucu">Konghucu</option>
                @endif
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
            <input type="hidden" name="id_user" value="{{$siswa->id_user}}">
            </div>
  <!--  -->
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
