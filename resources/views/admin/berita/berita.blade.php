@extends('page/app_admin');
@section('content')
<div class="container">
<div class="panel-body">
      <h3 class="panel-title">
        Berita 
          <a href="{{ route('tambah.berita') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create User"><i class="icon-plus"></i>Tambah berita</a>
      </h3>
<div class="panel-heading">
     
      </div>
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>File</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Tanggal Terbit</th>
        <th colspan="2" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($news as $berita)
      <tr>
        <td>{{$berita->nama_berita}}</td>
        <td>{{$berita->jurusan->nama_jurusan}}</td>
          <td class="text-center">
              <a href="{{ route('edit.berita',$berita->id)}}" class="btn btn-primary btn-sm inline mb-1">Edit</a>
              <form action="{{ route('delete.berita', $berita->id)}}" method="post">
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