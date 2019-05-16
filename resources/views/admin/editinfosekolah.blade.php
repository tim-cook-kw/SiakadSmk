@extends('page/app_admin');
@section('content')
<div class="container">
<h3 class="panel-title">
    Info Sekolah          
</h3>

<form action="{{Route('update.sekolah', $sekolah->id)}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="name">Nama Sekolah</label>
    <input type="text" name="name" value="{{$sekolah->nama}}" class="form-control" id="name" >
  </div>
  <div class="form-group">
    <label for="email">Visi</label>
    <input type="text" name="visi" value="{{$sekolah->visi}}" class="form-control" id="email" >
  </div>
  <div class="form-group">
    <label for="email">Misi</label>
    <input type="text" name="misi" class="form-control" id="nip" value="{{$sekolah->misi}}" >
  </div>
  <div class="form-group">
    <label for="pwd">Kepala Sekolah</label>
    <input type="text" name="kepsek" class="form-control" id="pwd" value="{{$sekolah->nama_kepsek}}" >
  </div>
  <div class="form-group">
  <label for="nip">NIP Kepala Sekolah</label>
  <input type="number" name="nip" class="form-control" id="pwd" value="{{$sekolah->nip_kepsek}}" >
  </div>
  <div class="form-group">
  <label for="nip">Alamat</label>
  <input type="text" name="alamat" class="form-control" id="pwd" value="{{$sekolah->alamat}}" >
  </div>
  <div class="form-group">
  <label for="nip">Nomor Telepon</label>
  <input type="number" name="no_telp" class="form-control" id="pwd" value="{{$sekolah->no_telepon}}" >
  </div>
  <div class="form-group">
  <label for="nip">Email Sekolah</label>
  <input type="email" name="email" class="form-control" id="pwd" value="{{$sekolah->email}}" >
  </div>
  <div class="form-group">
  <label for="nip">Web Sekolah</label>
  <input type="text" name="web" class="form-control" id="pwd" value="{{$sekolah->web}}" >
  </div>
  <div class="form-group">
  <label for="logo">Logo Sekolah</label>
  <img class="profile-pic" src="{{url('images', $sekolah->logo)}}" alt="" style="max-width:200px;max-height:200px;">
  </div>
  <div class="p-image">
       <i class="fa fa-camera upload-button"></i>
        <input class="file-upload" type="file" accept="image/*" name="logo"/>
    </div>
    <button type="submit" class="btn btn-default">Save</button>

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