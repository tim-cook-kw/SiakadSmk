@extends('page.guru')
@section('content1')
<div class="container">
<button class="btn btn-success pull-right modal-show" data-toggle="modal" data-target="#modalAdd" <i class="icon-plus"></i>Tugas</button>
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
            <td><a  href="/guru/tugas/delet/{{$item->id}}" title="Delete"><i class="fa fa-trash" style="color:red;text-shadow:1px 1px 4px black; margin: 2px;"></i></a></td>
        </tr>
        
    </tbody>
    @endforeach
</table>
</div>
@include('guru.tugas.modal.addtugas')
@endsection