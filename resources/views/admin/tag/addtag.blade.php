@extends('page/app_admin');
@section('content')
    <form action="{{Route('insert.tag')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Tag</label>
            <input type="text" name="nama" class="form-control" id="nama">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection