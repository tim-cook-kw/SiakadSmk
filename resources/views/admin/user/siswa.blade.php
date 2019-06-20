@extends('page/app_admin');
@section('content')
<div class="container">
    <div class="panel-body">
        <h3 class="panel-title">
            Siswa
        </h3>
        <a href="{{ route('tambah.user') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;"
            title="Create User"><i class="icon-plus"></i>Tambah Siswa</a>
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

                        <a href="{{ url('/admin/detailsiswa/' . $siswas->id) }}" class="lihat" title="lihat detail"><i class="fa fa-eye" style="color:black;text-shadow:1px 1px 4px black; margin: 2px;"></i></a>
                        @endforeach
                        <a href="{{ url('/admin/siswa/' . $users->id) }}" title="tambah detail"><i class="fa fa-plus"
                                style="color:aqua;text-shadow:1px 1px 4px black; margin:2px;"></i></a>
                        <a href="{{ url('/admin/siswa/edit/' . $users->id) }}" title="edit"><i class="fa fa-edit"
                                style="color:black;text-shadow:1px 1px 4px black; margin: 2px;"></i></a>
                                <form action="{{ route('delete.siswa', $users->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit" title="Delete"><i class="fa fa-trash" style="color:red;text-shadow:1px 1px 4px black; margin: 2px;"></i></button>
                                </form>
                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
