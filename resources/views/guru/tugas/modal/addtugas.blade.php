<div id="modalAdd" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
                <form action="{{ route('insert.tugas') }}" method="POST" enctype="multipart/form-data">
                
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"></label>
                            <input type="text" name="nama" class="form-control" id="inputEmail4" placeholder="Nama Tugas">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_jurusan">Nama Guru</label>
                            <p>{{$guru->nama}}</p>
                            <input type="hidden" name="id_guru" value="{{$guru->id}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_jurusan">Nama Kelas</label>
                            <select name="id_kelas" id="id_jurusan" class="form-control">
                                @foreach($kelas as $kelass)
                                    <option value="{{$kelass->id}}"> {{ $kelass->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_jurusan">Nama Mapel</label>
                            <select name="id_mapel" id="id_jurusan" class="form-control">
                                @foreach($mapel as $gurus)
                                    <option value="{{$gurus->id}}"> {{ $gurus->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload tugas</label>
                                <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        

                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            
            <div class="modal-footer">
                <button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>