<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Tag;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $news = Berita::with('tag')->get();
        $tags = Tag::all();
        return view('admin.berita.berita', compact('tags', 'news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.berita.addberita', compact('tags'));
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
            'id_tags'=>'required',
            'judul'=>'required',
            'isi'=>'required',
            'file'=>'required',
            'tanggal_terbit'=>'required'
        ]);

        $filename = $this->getFileName($request->file);
        $request->file->move(base_path('public/images'), $filename);        
        $news = new Berita([
            'file' => $filename,
            'judul' => $request->get('judul'),
            'isi' => $request->get('isi'),       
            'id_tags' => $request->get('id_tags'),
            'tanggal_terbit' => $request->get('tanggal_terbit')
        ]);
        $news->save();
        return redirect('/admin/berita')->with('success', 'Berita saved!');
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
        $news = Berita::find($id);
        $tags = Tag::all();
        return view('admin.berita.editberita', compact('news', 'tags'));
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
            'id_tags'=>'required',
            'judul'=>'required',
            'isi'=>'required',
            'file'=>'required',
            'tanggal_terbit'=>'required'
        ]);

        $filename = $this->getFileName($request->file);
        $request->file->move(base_path('public/images'), $filename);        
        $news = new Berita([
            'file' => $filename,
            'judul' => $request->get('judul'),
            'isi' => $request->get('isi'),       
            'id_tags' => $request->get('id_tags'),
            'tanggal_terbit' => $request->get('tanggal_terbit')
        ]);
        $news->save();
        return redirect('/admin/berita')->with('success', 'Berita updated!');
    }   
    protected function getFileName($file)
    {
        return str_random(32) . '.' . $file->extension();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Berita::find($id);
        $news->delete();

        return redirect('/admin/berita')->with('success', 'Berita deleted!');
    }
}
