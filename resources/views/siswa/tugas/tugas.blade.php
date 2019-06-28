@extends('page.siswa')
@section('content2')
<div class="container">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tugas</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php $no = 0;?>
@foreach ($tugas as $item)
<?php $no++ ;?>
    <tbody>
        <tr>
            <td>{{$no}}</td>
            <td>{{$item->tugas}}</td>
            <td>{{$item->id_kelas}}</td>
            
        </tr>
        
    </tbody>
    @endforeach
</table>
</div>

@endsection