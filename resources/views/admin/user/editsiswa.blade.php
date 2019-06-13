@extends('page/app_admin');
@section('content')
<div class="container">
    <form action="{{Route('edit.user', $siswa->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $siswa->name }}" id="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $siswa->email }}" id="email">
        </div>
        <div class="form-group">
            <label for="email">Nomor Induk</label>
            <input type="number" name="nip" class="form-control" value="{{ $siswa->nip }}" id="nip">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control"  id="pwd">
        </div>
        <input type="hidden" name="status" value="3">
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection
