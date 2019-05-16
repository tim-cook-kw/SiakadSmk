<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Http\Request;

class jurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('admin.jurusan.jurusan', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jurusan.addjurusan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan'=>'required',
            'visi'=>'required',
            'misi'=>'required'
        ]);

        $jurusan = new Jurusan([
            'nama_jurusan' => $request->get('nama_jurusan'),
            'visi' => $request->get('visi'),
            'misi' => $request->get('misi')
        ]);
        $jurusan->save();
        return redirect('/admin/jurusan')->with('success', 'Jurusan saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        return view('admin.jurusan.editjurusan', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jurusan'=>'required',
            'visi'=>'required',
            'misi'=>'required'
        ]);


        $jurusan = Jurusan::find($id);
        $jurusan->nama_jurusan =  $request->get('nama_jurusan');
        $jurusan->visi = $request->get('visi');
        $jurusan->misi = $request->get('misi');
        $jurusan->save();

        return redirect('/admin/jurusan')->with('success', 'Jurusan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();

        return redirect('/admin/jurusan')->with('success', 'Jurusan deleted!');
    }
//    public function dataTable(){
////        $model = Jurusan::query();
////        return DataTables::of($model)
////            ->addColumn('action', function ($model){
////                return view('#', [
////                    'model' => $model,
////                    'url_show' => route('jurusan.show', $model->id),
////                    'url_edit' => route('jurusan.edit', $model->id),
////                    'url_destroy' => route('jurusan.destroy', $model->id)
////                ]);
////            })
////            ->addIndexColumn()
////            ->rawColumns(['action'])
////            ->make(true);
////    }
//    public function indexJurusan(){
//        $jurusan = Jurusan::all();
//        return view('admin.jurusan.jurusan', compact('jurusan'));
//    }
//    public function tambahJurusan(){
//        return view('admin.jurusan.addjurusan');
//    }
//    public function addJurusan(Request $request){
//        DB::select('call insertUser(?, ?, ?, ?, ?)',[
//            $request->input('nama_jurusan'),
//            $request->input('visi'),
//            $request->input('misi')
//        ]);
//        return redirect('admin/jurusan');
//    }
}


