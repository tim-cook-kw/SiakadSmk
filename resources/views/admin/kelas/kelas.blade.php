@extends('page/app_admin');
@section('content')
    <div class="container">
        <div class="panel-body">
            <h3 class="panel-title">
                kelas
                <a href="{{ route('tambah.kelas') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create User"><i class="icon-plus"></i>Tambah kelas</a>
            </h3>
            <div class="panel-heading">

            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nama Jurusan</th>
                    <th>Nama Kelas</th>
                    <th>Level</th>
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kelass as $kelas)
                    <tr>
                        <td>{{$kelas->jurusan->nama_jurusan}}</td>
                        <td>{{$kelas->nama_kelas}}</td>
                        <th>{{$kelas->level}}</th>
                        <td class="text-center">
                            <a href="{{ route('edit.kelas',$kelas->id)}}" class="btn btn-primary btn-sm inline mb-1">Edit</a>
                            <form action="{{ route('delete.kelas', $kelas->id)}}" method="post">
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