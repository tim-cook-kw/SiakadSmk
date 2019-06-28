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
           <TD><a class="btn btn-success pull-right modal-show" href="view_siswa/{{$users->id}}"><i class="icon-plus"></i>Lihat Kelas</<i></TD>
        </tr>

        @endforeach
    </tbody>
</table>
</div>

@endsection