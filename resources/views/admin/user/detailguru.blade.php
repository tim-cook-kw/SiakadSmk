@extends('page/app_admin');
@section('content')
<div>
    @foreach ($guru as $item)

<a href="{{ url('/admin/detailguru/edit/'.$item->id) }}" class="btn btn-success pull-right modal-show">Edit Detail
    Guru</a>
    <div class="jumbotron text-center">
        <table>
            <tr>
                <th> Nama </th>
                <td> : </td>
                <td> {{ $item->nama }} </td>
            </tr>
            <tr>
                <th> NIS </th>
                <td> : </td>
                <td> {{ $item->NIP }} </td>
            </tr>

            <tr>
                <th> Jurusan </th>
                <td> : </td>
                <td> {{ $jurusan->nama_jurusan }} </td>
            </tr>
            <tr>
                <th>Wali Kelas </th>
                <td> : </td>
                <td> {{ $kelas->level }}{{ $kelas->nama_kelas}} </td>
            </tr>
            <tr>
                <th> Mata Pelajaran </th>
                <td> : </td>
                <td> {{ $mapel->nama_mapel }} </td>
            </tr>
            <tr>
                <th> Jenis Kelamin </th>
                <td> : </td>
                <td> {{ $item->jenis_kelamin }} </td>
            </tr>
            <tr>
                <th> Tempat Tanggal Lahir </th>
                <td> : </td>
                <td> {{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }} </td>
            </tr>
                <th> No. Telepon </th>
                <td> : </td>
                <td> {{ $item->no_telepon }} </td>
            </tr>
            <tr>
                <th> Email </th>
                <td> : </td>
                <td> {{ $user->email }} </td>
            </tr>

        </table>
    </div>
    @endforeach
</div>
@endsection
