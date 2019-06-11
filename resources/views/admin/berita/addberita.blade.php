@extends('page/app_admin');
@section('content')
<form action="{{Route('insert.mapel')}}" method="post">
@csrf
  <div class="form-group">
    <label for="file">File</label>
    <input type="file" name="file" class="form-control" id="file">
  </div>
  <div class="form-group">
    <label for="judul">Judul Berita</label>
    <input type="text" name="judul" class="form-control" id="judul">
  </div>
  <div class="form-group">
    <label for="isi">Isi Berita</label>
    <textarea name="isi" id="isi" cols="30" rows="10" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="id_tags">Tags</label>
      <select name="id_tags" id="id_tags" class="form-control">
          @foreach($tags as $tag)
          <option value="{{$tag->id}}"> {{ $tag->nama }}</option>
              @endforeach
      </select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection