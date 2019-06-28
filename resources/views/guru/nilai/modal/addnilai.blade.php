@extends('page.guru')
@section('content1')


                <form action="{{ Route('insert.nilai') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6" >
                            <label for="inputEmail4">Nama Siswa</label>
                            <p>{{$siswa->nama}}</p>
                            <input type="hidden" name="id_siswa" value="{{$siswa->id}}">
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="id_jurusan">Nama Kelas</label>
                            <p>{{$kelas->nama_kelas}}</p>
                            <input type="hidden" name="id_kelas" value="{{$siswa->id_kelas}}">
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="inputEmail4">Nilai UH1</label>
                            <input type="number" name="UH1" class="form-control" id="inputEmail4"
                                placeholder="Nama Tugas" required>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="inputEmail4">Nilai UTS</label>
                            <input type="number" name="UTS" class="form-control" id="inputEmail4"
                                placeholder="Nama Tugas" required>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="inputEmail4">Nilai UH2</label>
                            <input type="number" name="UH2" class="form-control" id="inputEmail4"
                                placeholder="Nama Tugas" required>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="inputEmail4">Nilai UAS</label>
                            <input type="number" name="UAS" class="form-control" id="inputEmail4"
                                placeholder="Nama Tugas" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Semester</label>
                            <input type="number" name="semester" class="form-control" id="inputEmail4"
                                placeholder="Nama Tugas" required>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload tugas</label>
                        <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                

      

            

@endsection