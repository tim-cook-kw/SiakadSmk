@extends('page/app_admin');
@section('content')
<div class="container">
<div class="panel-body">
<h3 class="panel-title">
          Siswa
      </h3>
      <a href="{{ route('tambah.user') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create User"><i class="icon-plus"></i>Tambah Siswa</a>
<div class="panel-heading">
     
      </div>
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>NIP</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($user as $users)
      <tr>
        <td>{{$users->name}}</td>
        <td>{{$users->email}}</td>
        <td>{{$users->nip}}</td>
        <td>
        @foreach($siswa as $siswas)
        @if($users->id == $siswas->id_user)
        <a href="" class="btn btn-success pull-right modal-show mx-1" title="Create User"><i class="icon-plus"></i>Lihat Detail</a>
        <a href="{{ url('/admin/siswa/edit/' . $users->id) }}" class="btn btn-success pull-right modal-show" title="Create User"><i class="icon-plus"></i>Edit Detail</a>
        @else
        <a href="{{ url('/admin/siswa/' . $users->id) }}" class="btn btn-success pull-right modal-show" title="Create User"><i class="icon-plus"></i>Tambah Detail</a>
        @endif
        @endforeach
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection