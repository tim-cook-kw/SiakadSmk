@extends('page.guru')
@section('content1')
<div class="container">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;?>
            @foreach($kelas as $users)
            <?php $no++ ;?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{$users->nama}}</td>
                <TD>
                        <a href="{{ url('/guru/nilai/addnilai/' . $users->id) }}">TEst</a>
                    
                   </TD>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection
