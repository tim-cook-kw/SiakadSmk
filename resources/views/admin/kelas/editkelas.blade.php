@extends('page/app_admin');
@section('content')
  <form action="{{Route('update.jurusan', $mapel->id)}}" method="post">
    @csrf

    <div class="form-group">
      <label for="nama_mapel">Nama Mata Pelajaran</label>
      <input type="text" name="nama_mapel" class="form-control" id="nama_mapel" value="{{$mapel->nama_mapel}}">
    </div>

    <div class="form-group">
      <label for="id_jurusan">Nama Jurusan</label>
      <select name="id_jurusan" id="" class="form-control">
        <option value="{{$mapel->id}}">{{$mapel->jurusan->nama_jurusan}}</option>
      </select>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
@endsection