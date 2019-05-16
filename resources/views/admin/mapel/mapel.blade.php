@extends('page/app_admin');
@section('content')
<div class="container">
<div class="panel-body">
<h3 class="panel-title">
Mapel
          <a href="{{ route('tambah.mapel') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create User"><i class="icon-plus"></i>Tambah Mapel</a>
      </h3>
<div class="panel-heading">
     
      </div>
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama mata Pelajaran</th>
        <th>Nama Jurusan</th>
          <th colspan="2" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($mapels as $mapel)
      <tr>
        <td>{{$mapel->nama_mapel}}</td>
        <td>{{$mapel->jurusan->nama_jurusan}}</td>
          <td class="text-center">
              <a href="{{ route('edit.mapel',$mapel->id)}}" class="btn btn-primary btn-sm inline mb-1">Edit</a>
              <form action="{{ route('delete.mapel', $mapel->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm inline" type="submit">Delete</button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection