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
        <th class="col-2">File</th>
        <th class="col-2">Judul</th>
        <th class="col-2">Isi</th>
        <th class="col-2">Tanggal Terbit</th>
        <th class="col-2">Tag</th>
        <th class="col-2" colspan="2" class="text-center">Aksi</th>
      </tr> 
    </thead>
    <tbody>
    @foreach($news as $berita)
      <tr>
        <td class="text-center"><img src="{{ URL::to('/') }}/images/{{ $berita->file }}" class="img-thumbnail" width="75"></td>
        <td>{{$berita->judul}}</td>
        <td>{{$berita->isi}}</td>
        <td>{{$berita->tanggal_terbit}}</td>
        <td>{{$berita->tag->nama}}</td>
          <td class="text-center">
              {{-- <a href="#" class="btn btn-primary btn-sm inline mb-1">Edit</a> --}}
              {{-- {{ route('edit.berita',$berita->id)}} --}}
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