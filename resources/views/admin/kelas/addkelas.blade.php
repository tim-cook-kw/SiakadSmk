@extends('page/app_admin');
@section('content')
    <form action="{{Route('insert.kelas')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="id_jurusan">Nama Jurusan</label>
            <select name="id_jurusan" id="id_jurusan" class="form-control">
                @foreach($jurusans as $jurusan)
                    <option value="{{$jurusan->id}}"> {{ $jurusan->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <select name="level" id="level" class="form-control">
                <option value="">Pilih Level</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection