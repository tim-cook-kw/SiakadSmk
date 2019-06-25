@extends('page/guru');
@section('content1')




<table>
    <thead>
        <td>No</td>
        <td>Nama</td>
        <td>Keterangan</td>
    </thead>
    <?php $no = 0;?>
    @foreach ($siswa as $item)
    <?php $no++ ;?>
    <tbody>
        <td>{{ $no }}</td>
        <td>{{ $item->nama }}</td>
        <td>
            <form action="{{ Route('absen.siswa') }}" method="get">
                @csrf
                <input type="hidden" name="id_siswa" value="{{ $item->id }}">
                <input type="hidden" name="keterangan" value="masuk">
                <button type="submit">Masuk</button>
            </form>
            <form action="{{ Route('absen.siswa') }}" method="get">
                @csrf
                <input type="hidden" name="id_siswa" value="{{ $item->id }}">
                <input type="hidden" name="keterangan" value="izin">
                <button type="submit">Izin</button>
            </form>
            <form action="{{ Route('absen.siswa') }}" method="get">
                @csrf
                <input type="hidden" name="id_siswa" value="{{ $item->id }}">
                <input type="hidden" name="keterangan" value="sakit">
                <button type="submit">Sakit</button>
            </form>
            <form action="{{ Route('absen.siswa') }}" method="get">
                @csrf
                <input type="hidden" name="id_siswa" value="{{ $item->id }}">
                <input type="hidden" name="keterangan" value="alfa">
                <button type="submit">Tanpa Keterangan</button>
            </form>
        </td>
    </tbody>
    @endforeach
</table>


@endsection
