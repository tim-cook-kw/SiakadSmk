@extends('page/app_admin');
@section('content')
<div class="container">
    <h3 class="panel-title">
        Edit Detail guru
    </h3>
    <form action="{{Route('update.guru', $guru->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{$guru->nama}}" id="name">
        </div>
        <div class="form-group">
            <label for="email">Nomor Induk Pengajaran</label>
            <input type="number" name="nis" class="form-control" id="nip" value="{{$guru->NIP}}">
        </div>
        <div class="form-group">
            <label for="id_jurusan">Jenis Kelamin</label>
            <select name="jenis" id="id_jurusan" class="form-control">
                @if($guru->jenis_kelamin == "Perempuan")
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan" selected="selected">Perempuan</option>
                @else
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="email">Tempat Lahir</label>
            <input type="text" name="tempat" class="form-control" value="{{$guru->tempat_lahir}}" id="nip">
        </div>
        <div class="form-group">
            <label for="email">Tanggal Lahir</label>
            <input type="date" name="tanggallahir" value="{{$guru->tanggal_lahir}}" class="form-control" id="nip">
        </div>
        <div class="form-group">
            <label for="email">Nomor Telepon</label>
            <input type="number" name="telp" value="{{$guru->no_telepon}}" class="form-control" id="nip">
        </div>


        <div class="form-group">
            <label for="id_jurusan">Jurusan</label>
            <select name="id_jurusan" id="id_jurusan" class="form-control">
                @foreach($jurusan as $jurusans)
                <option value="{{$jurusans->id}}"> {{ $jurusans->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_jurusan">Kelas</label>

            <select name="id_kelas" id="id_kelas" class="form-control">
                @foreach($kelas as $kelass)
                <option value="{{$kelass->id}}"> {{ $kelass->nama_kelas }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id_user" value="{{$guru->id_user}}">
        </div>
        <div class="form-group">
            <label for="id_jurusan">Mata Pelajaran</label>
            <select name="id_mapel" id="id_jurusan" class="form-control">
                @foreach($mapel as $item)
                <option value="{{$item->id}}"> {{ $item->nama_mapel }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

@endsection
@push('upload')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});

$(".upload-button").on('click', function() {
   $(".file-upload").click();
});
});
</script>
@endpush
