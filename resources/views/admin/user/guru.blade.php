@extends('page/app_admin');
@section('content')
<div class="container">
<div class="panel-body">
<h3 class="panel-title">
Guru
          <a href="{{ route('tambah.guru') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create User"><i class="icon-plus"></i>Tambah Guru</a>
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
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection