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
        <td>Nama</td>
        <td>:</td>
        <td>{{ $item->nama }}</td>
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
    </div>
    <div class="col-sm-8">
        <p class="font-weight-normal" style="margin-left:-200px;">{{ $siswa->nama }}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <p class="font-weight-normal" style="margin-left:100px;">NIS:</p>
    </div>
    <div class="col-sm-8">
        <p class="font-weight-normal" style="margin-left:-200px;">{{ $siswa->NIS }}</p>
    </div>
</div> --}}
@endsection
