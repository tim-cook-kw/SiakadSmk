@extends('page/app_admin');
@section('content')
<div class="panel-body">
<h3 class="panel-title">
          <a href="{{ route('tambah.user') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create User"><i class="icon-plus"></i>Tambah Siswa</a>
      </h3>
<div class="panel-heading">
     
      </div>
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>NIP</th>
      </tr>
    </thead>
    <tbody>
    @foreach($user as $users)
      <tr>
        <td>{{$users->name}}</td>
        <td>{{$users->email}}</td>
        <td>{{$users->nip}}</td>
        <td><a href="{{ url('/admin/siswa/' . $users->id) }}" class="btn btn-success pull-right modal-show" title="Create User"><i class="icon-plus"></i>Tambah Detail</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection