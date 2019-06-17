@extends('guru/guru');
@section('content1')
<form action="{{Route('insert.absen')}}" method="post">
@csrf
<div class="form-group">
@foreach($absen as $absn)
    <label for="id_siswa">{{$absn->id}}</label>
    <input type="text" name="id_siswa" class="form-control" id="id_siswa">
  </div>
  <div class="form-group">
    <label for="waktu">waktu</label>
    <input type="text" name="waktu" class="form-control" id="waktu">
  </div>
  <div class="form-group">
    <label for="keterangan">keterangan</label>
    <input type="text" name="keterangan" class="form-control" id="keterangan">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endforeach
@endsection