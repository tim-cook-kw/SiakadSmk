@extends('page/app_admin');
@section('content')
<div>
@forelse($siswa as $item)
<div class="container">
    <img src="{{url('siswa', $item->foto)}}" class="mx-auto d-block" alt="foto siswa"
        style="max-width:200px;max-height:200px;">
    <a href="{{ url('/admin/detailsiswa/edit/'.$item->id) }}" class="btn btn-success pull-right modal-show">Edit Detail Siswa</a>
</div>
<table>
    <tr>
        <th> Nama </th>
        <td> : </td>
        <td> {{ $item->nama }} </td>
    </tr>
    <tr>
        <th> NIS </th>
        <td> : </td>
        <td> {{ $item->nis }} </td>
    </tr>
    <tr>
        <th> Jenis Kelamin </th>
        <td> : </td>
        <td> {{ $item->jenis_kelamin }} </td>
    </tr>
</table>
@empty

    <h1>Detail Belum ditambahkan</h1>

    <a href="{{ url('/admin/siswa/' . $users->id) }}" class="btn btn-success">Tambah data</a>



@endforelse

</div>
{{-- <div class="row">
    <div class="col-sm-4">
        <p class="font-weight-normal" style="margin-left:100px;">Nama:</p>
    </div></br>
    <div class="col-sm-8">
        <p class="font-weight-normal" style="margin-left:-200px;">{{ $siswa->nama }}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-4" style="margin-bottom:20%;">
        <p class="font-weight-normal" style="margin-left:100px;">NIS:</p>
    </div>
    <div class="col-sm-8">
        <p class="font-weight-normal" style="margin-left:-200px;">{{ $siswa->NIS }}</p>
    </div>
    <div class="row">
    <div class="col-sm-4" style="margin-left:100px;">
        <p class="font-weight-normal">Jenis Kelamin :</p>
    </div>
    <div col="col-sm-8">
    <p class="font-weight-normal" style="margin-left:-200px;">{{ $siswa->jenis_kelamin }}</p></div>
    
    </div>

</div> --}}
@endsection
