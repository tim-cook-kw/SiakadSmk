@extends('page/app_admin');
@section('content')
<form action="{{Route('update.jurusan', $jurusan->id)}}" method="post">
@csrf

<div class="form-group">
    <label for="nama_jurusan">Nama Siswa</label>
    <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" value="{{$jurusan->nama_jurusan}}">
  </div>
  <div class="form-group">
    <label for="visi">Waktu</label>
    <input type="text" name="visi" class="form-control" id="visi" value="{{$jurusan->visi}}">
  </div>
  <div class="form-group">
    <label for="misi">Keterangan</label>
    <input type="text" name="misi" class="form-control" id="misi" value="{{$jurusan->misi}}">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection