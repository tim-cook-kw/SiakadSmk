@extends('page/app_admin');
@section('content')
<form action="" method="post">
@csrf
<?php $no = 0;?>
@foreach ($siswa as $item)
<?php $no++ ;?>
<table>
    <thead>
        <td>No</td>
        <td>Nama</td>
        <td>Keterangan</td>
    </thead>
    <tbody>
        <td>{{ $no }}</td>
        <td>{{ $item->nama }}</td>
        <td><select name="keterangan" id="">
            <option value="masuk">Masuk</option>
            <option value="izin">Izin</option>
            <option value="sakit">Sakit</option>
            <option value="alfa">Alfa</option>
            </select></td>
    </tbody>
</table>
@endforeach
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection
