@extends('guru.guru');
@section('content1')
<form action="{{Route('insert.absen')}}" method="post">
@csrf
<div class="form-group">
@foreach($absen as $absn)
    <label for="nama_jurusan">{{$absn->id}}</label>
    <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan">
  </div>
  <div class="form-group">
    <label for="visi">Visi jurusan</label>
    <input type="text" name="visi" class="form-control" id="visi">
  </div>
  <div class="form-group">
    <label for="misi">Misi Jurusan</label>
    <input type="text" name="misi" class="form-control" id="misi">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endforeach
@endsection