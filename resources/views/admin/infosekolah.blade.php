@extends('page/app_admin');
@section('content')
<div class="container">
<h3 class="panel-title">
    Info Sekolah          
</h3>
@forelse($info as $infosekolah)
<div class="form-group">
    <label for="name">Nama Sekolah</label>
    <input type="text" name="name" value="{{$infosekolah->nama}}" class="form-control" id="name" disabled>
  </div>
  <div class="form-group">
    <label for="email">Visi</label>
    <input type="text" name="visi" value="{{$infosekolah->visi}}" class="form-control" id="email" disabled>
  </div>
  <div class="form-group">
    <label for="email">Misi</label>
    <input type="text" name="misi" class="form-control" id="nip" value="{{$infosekolah->misi}}" disabled>
  </div>
  <div class="form-group">
    <label for="pwd">Kepala Sekolah</label>
    <input type="text" name="kepsek" class="form-control" id="pwd" value="{{$infosekolah->nama_kepsek}}" disabled>
  </div>
  <div class="form-group">
  <label for="nip">NIP Kepala Sekolah</label>
  <input type="number" name="nip" class="form-control" id="pwd" value="{{$infosekolah->nip_kepsek}}" disabled>
  </div>
  <div class="form-group">
  <label for="nip">Alamat</label>
  <input type="text" name="alamat" class="form-control" id="pwd" value="{{$infosekolah->alamat}}" disabled>
  </div>
  <div class="form-group">
  <label for="nip">Nomor Telepon</label>
  <input type="number" name="no_telp" class="form-control" id="pwd" value="{{$infosekolah->no_telepon}}" disabled>
  </div>
  <div class="form-group">
  <label for="nip">Email Sekolah</label>
  <input type="email" name="email" class="form-control" id="pwd" value="{{$infosekolah->email}}" disabled>
  </div>
  <div class="form-group">
  <label for="nip">Web Sekolah</label>
  <input type="text" name="web" class="form-control" id="pwd" value="{{$infosekolah->web}}" disabled>
  </div>
  <div class="form-group">
  <label for="logo">Logo Sekolah</label>
  <img src="{{url('images', $infosekolah->logo)}}" alt="" style="max-width:200px;max-height:200px;">
  </div>
  <a href="{{Route('edit.sekolah', $infosekolah->id)}}" class="btn btn-primary btn-sm inline mb-1">Edit</a>

@empty
<form action="{{Route('insert.infosekolah')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="name">Nama Sekolah</label>
    <input type="text" name="name" class="form-control" id="name">
  </div>
  <div class="form-group">
    <label for="email">Visi</label>
    <input type="text" name="visi" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">Misi</label>
    <input type="text" name="misi" class="form-control" id="nip">
  </div>
  <div class="form-group">
    <label for="pwd">Kepala Sekolah</label>
    <input type="text" name="kepsek" class="form-control" id="pwd">
  </div>
  <div class="form-group">
  <label for="nip">NIP Kepala Sekolah</label>
  <input type="number" name="nip" class="form-control" id="pwd">
  </div>
  <div class="form-group">
  <label for="nip">Alamat</label>
  <input type="text" name="alamat" class="form-control" id="pwd">
  </div>
  <div class="form-group">
  <label for="nip">Nomor Telepon</label>
  <input type="number" name="no_telp" class="form-control" id="pwd">
  </div>
  <div class="form-group">
  <label for="nip">Email Sekolah</label>
  <input type="email" name="email" class="form-control" id="pwd">
  </div>
  <div class="form-group">
  <label for="nip">Web Sekolah</label>
  <input type="text" name="web" class="form-control" id="pwd">
  </div>
  <div class="form-group">
  <label for="logo">Logo Sekolah</label>
  <input type="file" name="logo" class="form-control">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endforelse
</div>
@endsection
@push('test')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush