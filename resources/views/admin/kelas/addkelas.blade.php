@extends('page/app_admin');
@section('content')
    <form action="{{Route('insert.kelas')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_kelas">Nama Mata Pelajaran</label>
            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas">
        </div>
        <div class="form-group">
            <label for="id_jurusan">Nama Jurusan</label>
            <select name="id_jurusan" id="id_jurusan" class="form-control">
                @foreach($jurusans as $jurusan)
                    <option value="{{$jurusan->id}}"> {{ $jurusan->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection