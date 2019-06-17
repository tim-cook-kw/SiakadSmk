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
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($user as $users)
      <tr>
        <td>{{$users->name}}</td>
        <td>{{$users->email}}</td>
        <td>{{$users->nip}}</td>
        <td><a href="{{ url('/admin/detailsiswa/' . $users->id) }}" class="lihat" title="lihat detail"><i class="fa fa-eye"
        style="color:black;text-shadow:1px 1px 4px black; margin: 2px;"></i></a>
                        <a href="{{ url('/admin/guru/' . $users->id) }}" title="tambah detail"><i class="fa fa-plus"
                                style="color:aqua;text-shadow:1px 1px 4px black; margin:2px;"></i></a>
                        <a href="{{ url('/admin/guru/edit/' . $users->id) }}" title="edit"><i class="fa fa-edit"
                                style="color:black;text-shadow:1px 1px 4px black; margin: 2px;"></i></a>

                        <a  href="/admin/guru/delete/{{$users->id}}" title="Delete"><i class="fa fa-trash" style="color:red;text-shadow:1px 1px 4px black; margin: 2px;"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection
