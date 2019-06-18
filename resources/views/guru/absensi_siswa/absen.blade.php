@extends('page.guru')
@section('content1')
<div class="container">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0;?>
        @foreach($kelas as $users)
        <?php $no++ ;?>
        <tr>
            <td>{{ $no }}</td>
            <td>{{$users->nama_kelas}}</td>
            <td>{{ $users->level }}</td>
            <td>
                 <a href="{{ url('/guru/addabsen/'.$users->id) }}" class="btn btn-success pull-right modal-show"<i class="icon-plus"></i>Absensi</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
</div>

@endsection
