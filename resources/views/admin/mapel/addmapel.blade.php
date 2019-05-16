@extends('page/app_admin');
@section('content')
<form action="{{Route('insert.mapel')}}" method="post">
@csrf
<div class="form-group">
    <label for="nama_mapel">Nama Mata Pelajaran</label>
    <input type="text" name="nama_mapel" class="form-control" id="nama_mapel">
  </div>
  <div class="form-group">
    <label for="id_jurusan">Nama Jurusan</label>
      <select name="id_jurusan" id="id_jurusan" class="form-control">
          @foreach($jurusans as $jurusan)
          <option value="{{$jurusan->id}}"> {{ $jurusan->nama_jurusan }}</option>
              @endforeach
      </select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection