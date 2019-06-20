@extends('page/app_admin');
@section('content')
<div class="row">


    <img src="{{url('siswa', $siswa->foto)}}" class="mx-auto d-block" alt="foto siswa"
        style="max-width:200px;max-height:200px;">
</div>
<table>
    <tr>
        <td>Nama</td><td>:</td><td>{{ $siswa->nama }}</td>
    </tr>

</table>
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
