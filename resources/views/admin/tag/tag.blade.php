@extends('page/app_admin');
@section('content')
    <div class="container">
        <div class="panel-body">
            <h3 class="panel-title">
                tag
                <a href="{{ route('tambah.tag') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create User"><i class="icon-plus"></i>Tambah tag</a>
            </h3>
            <div class="panel-heading">

            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nama Tag</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td class="col-8">{{$tag->nama}}</td>
                        <td class="text-center">
                            <form action="{{ route('delete.tag', $tag->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-md inline" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection