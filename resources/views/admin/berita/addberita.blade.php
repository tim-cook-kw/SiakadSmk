@extends('page/app_admin');
@section('content')
<form enctype="multipart/form-data" action="{{Route('insert.berita')}}" method="post">
@csrf   
  <div class="form-group">
    <label for="file">image</label>
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
  <div class="form-group">
    <label for="tanggal_terbit">image</label>
    <input type="date" name="tanggal_terbit" class="form-control" id="tanggal_terbit">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection