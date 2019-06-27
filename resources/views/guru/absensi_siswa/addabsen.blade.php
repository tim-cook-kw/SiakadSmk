@extends('page/guru');
@section('content1')



<table class="table table-hover ">
    <thead style="background-color:aqua;">
        <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Keterangan</td>
        </tr>
    </thead>
    <?php $no = 0;?>
    @foreach ($siswa as $item)
    <?php $no++ ;?>
    <tbody>
        <tr>
        <td>{{ $no }}</td>
        <td>{{ $item->nama }}</td>
        <td>

            <form action="{{ Route('absen.siswa') }}" method="get">
                @csrf
                <input type="hidden" name="id_siswa" value="{{ $item->id }}">
                <input type="hidden" name="keterangan" value="masuk">
                <button type="submit" class="btn btn-success">Masuk</button>
            </form>

            <form action="{{ Route('absen.siswa') }}" method="get" style="margin-left:15%;margin-top:-9%;">
                @csrf
                <input type="hidden" name="id_siswa" value="{{ $item->id }}">
                <input type="hidden" name="keterangan" value="izin">
                <button type="submit" class="btn btn-warning">Izin</button>
            </form>

            <form action="{{ Route('absen.siswa') }}" method="get" style="margin-left:26%;margin-top:-7%;">
                @csrf
                <input type="hidden" name="id_siswa" value="{{ $item->id }}">
                <input type="hidden" name="keterangan" value="sakit">
                <button type="submit" class="btn btn-danger">Sakit</button>
            </form>
            <form action="{{ Route('absen.siswa') }}" method="get" style="margin-left:40%;margin-top:-8%;">
                @csrf
                <input type="hidden" name="id_siswa" value="{{ $item->id }}">
                <input type="hidden" name="keterangan" value="alfa">
                <button type="submit" class="btn btn-danger">Alfa</button>
            </form>
        



            </td>
        </tr>
    </tbody>
    @endforeach
    </table>


@endsection
