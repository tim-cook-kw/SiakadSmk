@extends('page/app_admin');
@section('content')
<div>
<h3 class="panel-title">
  TambahDetailSiswa
</h3>
<div class="row">
   <div class="small-12 medium-2 large-2 columns">
     <div class="circle">
       <!-- User Profile Image -->
       <img class="profile-pic" style="max-width:200px;max-height:200px;float:left;"  src="http://cdn.cutestpaw.com/wp-content/uploads/2012/07/l-Wittle-puppy-yawning.jpg">

       <!-- Default Image -->
       <!-- <i class="fa fa-user fa-5x"></i> -->
     </div>
     <div class="p-image">
       <i class="fa fa-camera upload-button"></i>
        <input class="file-upload" type="file" accept="image/*"/>
     </div>
  </div>
</div>
<form action="{{Route('insert.user')}}" method="post">
@csrf

<div class="form-group">
    <label for="name">Nama</label>
    <input  type="text" name="name" class="form-control" value="{{$siswa->name}}" id="name" disabled>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" value="{{$siswa->email}}" disabled>
  </div>
  <div class="form-group">
    <label for="email">Nomor Induk Siswa</label>
    <input type="number" name="nip" class="form-control" id="nip" value="{{$siswa->nip}}" disabled>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

@endsection
@push('titit')
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