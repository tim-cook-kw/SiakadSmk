@extends('page/app_admin');
@section('content')
<div class="container">
<div class="panel-body">
<h3 class="panel-title">
Jurusan
          <a href="{{ route('tambah.jurusan') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create User"><i class="icon-plus"></i>Tambah Jurusan</a>
      </h3>
<div class="panel-heading">
     
      </div>
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama Jurusan</th>
        <th>Visi</th>
        <th>Misi</th>
          <th colspan="2" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($jurusans as $jurusan)
      <tr>
        <td>{{$jurusan->nama_jurusan}}</td>
        <td>{{$jurusan->visi}}</td>
        <td >{{$jurusan->misi}}</td>
          <td class="text-center">
              <a href="{{ route('edit.jurusan',$jurusan->id)}}" class="btn btn-primary btn-sm inline mb-1">Edit</a>
              <form action="{{ route('delete.jurusan', $jurusan->id)}}" method="post">
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