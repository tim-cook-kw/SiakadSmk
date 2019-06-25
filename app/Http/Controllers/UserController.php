<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Siswa;
use App\Jurusan;
use App\Kelas;
use App\Guru;
use App\Mapel;
use Image;
use File;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){
        $user = DB::table('users')->where('status', '3')->get();
        $siswa = Siswa::get();
        return view('admin.user.siswa', compact('user', 'siswa'));
    }
    public function tampilSiswa(){
        return view('admin.user.addsiswa');

    }
    public function tambahSiswa(Request $request){
        DB::select('call insertUser(?, ?, ?, ?, ?)',[
            $request->input('name'),
            $request->input('email'),
            Hash::make($request->input('password')),
            $request->input('nip'),
            $request->input('status'),
        ]);
        return redirect('admin/siswa');
    }
    public function indexeditsiswa($id){
        $siswa = User::where('id', $id)->first();
        return view('admin.user.editsiswa', compact('siswa'));
    }
    public function editSiswa(Request $request, $id){
        $pwd = Hash::make($request->get('password'));
        $siswa = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $pwd,
            'nip' => $request->get('nip'),
            'status' => $request->get('status')
        );
        User::whereId($id)->update($siswa);
        return redirect()->route('tampil.siswa');
    }
    public function deleteSiswa($id){
        $siswa = User::find($id);
        $detail = Siswa::where('id_user', $id);
        $siswa->delete();
        $detail->delete();
        return redirect()->route('tampil.siswa');
    }
    public function indexGuru(){
        $user = DB::table('users')->where('status','2')->get();
        $guru = Guru::all();
        return view('admin.user.guru', compact('user', 'guru'));
    }
    public function tambahGuru(){
        return view('admin.user.addguru');
    }
    public function addGuru(Request $request){
        DB::select('call insertUser(?, ?, ?, ?, ?)',[
            $request->input('name'),
            $request->input('email'),
            Hash::make($request->input('password')),
            $request->input('nip'),
            $request->input('status'),
        ]);
        return redirect('admin/guru');
    }
    public function indexEditGuru($id){
        $siswa = User::where('id', $id)->first();
        return view('admin.user.editguru', compact('siswa'));
    }
    public function editGuru(Request $request, $id){
        $pwd = Hash::make($request->get('password'));
        $siswa = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $pwd,
            'nip' => $request->get('nip'),
            'status' => $request->get('status')
        );
        User::whereId($id)->update($siswa);
        return redirect()->route('tampil.guru');
    }
    public function deleteGuru($id){
        $siswa = User::find($id);
        $detail = Guru::where('id_user', $id);
        $siswa->delete();
        $detail->delete();
        return redirect()->route('tampil.guru');
    }
    public function tambahDetailSiswa($id){
        $siswa = User::where('id', $id)->first();
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view ('admin.user.adddetailsiswa', compact('siswa', 'jurusan', 'kelas'));
    }
    public function insertDetailSiswa(Request $request){
        $filename = $this->getFileName($request->image);
        $request->image->move(base_path('public/siswa'), $filename);
        $siswa = new Siswa([
            'id_jurusan' => $request->get('id_jurusan'),
            'id_kelas' => $request->get('id_kelas'),
            'nama' => $request->get('name'),
            'NIS' => $request->get('nis'),
            'NISN' => $request->get('nisn'),
            'jenis_kelamin' => $request->get('jenis'),
            'agama' => $request->get('agama'),
            'foto' => $filename,
            'tempat_lahir' => $request->get('tempat'),
            'tanggal_lahir' => $request->get('tanggallahir'),
            'ayah' => $request->get('ayah'),
            'ibu' => $request->get('ibu'),
            'no_telepon'=> $request->get('telp'),
            'id_user'=> $request->get('id_user'),
        ]);
        $siswa->save();
        return redirect()->route('tampil.siswa');
    }
    protected function getFileName($file)
    {
        return str_random(32) . '.' . $file->extension();
    }
    public function indexEditDetailSiswa($id){
        $siswa = Siswa::where('id', $id)->first();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('admin.user.editdetailsiswa', compact('siswa', 'kelas', 'jurusan'));
    }
    public function editDetailSiswa(Request $request, $id){
        $filename = $request->get('name_image');
        $image = $request->file('image');
        if($image != ''){
            $request->validate([
            'image' => 'image|max:2048',
            'id_user'=> 'required'
            ]);
            $image->move(public_path('siswa'), $filename);
        }else{
            $request->validate([
                'id_user'=> 'required'
                ]);
        }
        $siswa = array(
            'id_jurusan' => $request->get('id_jurusan'),
            'id_kelas' => $request->get('id_kelas'),
            'nama' => $request->get('name'),
            'NIS' => $request->get('nis'),
            'NISN' => $request->get('nisn'),
            'jenis_kelamin' => $request->get('jenis'),
            'agama' => $request->get('agama'),
            'foto' => $filename,
            'tempat_lahir' => $request->get('tempat'),
            'tanggal_lahir' => $request->get('tanggallahir'),
            'ayah' => $request->get('ayah'),
            'ibu' => $request->get('ibu'),
            'no_telepon'=> $request->get('telp'),
            'id_user'=> $request->get('id_user'),
        );
        Siswa::where('id')->update($siswa);



        return redirect()->route('tampil.siswa');
    }

    public function detailSiwa($id){
        $siswa = Siswa::where('id_user', $id)->get();
        $users = User::where('id', $id)->first();
        foreach($siswa as $s){
        $get_jrs = $s->id_jurusan;
        $get_kelas = $s->id_kelas;
        }
        $jurusan = Jurusan::where('id', $get_jrs)->first();
        $kelas = Kelas::where('id', $get_kelas)->first();
        return view('admin.user.detailsiswa', compact('siswa', 'users', 'jurusan', 'kelas'));
    }
    public function indexAddDetailGuru($id){
        $guru = User::where('id', $id)->first();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $mapel = Mapel::all();
        return view('admin.user.adddetailguru', compact('guru', 'kelas', 'jurusan', 'mapel'));
    }
    public function addDetailGuru(Request $request){
        $guru = new Guru([
            'nama' => $request->get('name'),
            'NIP' => $request->get('nis'),
            'id_jurusan' => $request->get('id_jurusan'),
            'id_kelas' => $request->get('id_kelas'),
            'id_mapel' =>$request->get('id_mapel'),
            'jenis_kelamin' => $request->get('jenis'),
            'tempat_lahir' => $request->get('tempat'),
            'tanggal_lahir' => $request->get('tanggallahir'),
            'no_telepon' => $request->get('telp'),
            'id_user' => $request->get('id_user'),
        ]);
        $guru->save();
        return redirect()->route( 'tampil.guru');
    }
    public function detailGuru($id){
        $guru = Guru::where('id_user', $id)->get();
        $user = User::where('id', $id)->first();
        foreach($guru as $item){
            $get_kelas = $item->id_kelas;
            $get_mapel = $item->id_mapel;
            $get_jurusan = $item->id_jurusan;
        }
        $kelas = Kelas::where('id', $get_kelas)->first();
        $mapel = Mapel::where('id', $get_mapel)->first();
        $jurusan = Jurusan::where('id', $get_jurusan)->first();

        return view('admin.user.detailguru', compact('guru', 'user','kelas', 'mapel', 'jurusan'));
    }
    public function indexEditDetailGuru($id){
        $guru = Guru::where('id', $id)->first();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $mapel = Mapel::all();
        return view('admin.user.editdetailguru', compact('guru', 'kelas', 'jurusan', 'mapel'));

    }
    public function editDetailGuru(Request $request){
        $guru = array(
            'nama' => $request->get('name'),
            'NIP' => $request->get('nis'),
            'id_jurusan' => $request->get('id_jurusan'),
            'id_kelas' => $request->get('id_kelas'),
            'id_mapel' => $request->get('id_mapel'),
            'jenis_kelamin' => $request->get('jenis'),
            'tempat_lahir' => $request->get('tempat'),
            'tanggal_lahir' => $request->get('tanggallahir'),
            'no_telepon' => $request->get('telp'),
            'id_user' => $request->get('id_user'),
        );
        Guru::where('id')->update($guru);
        return redirect()->route('tampil.guru');
    }

}
