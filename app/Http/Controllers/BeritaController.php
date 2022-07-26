<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Berita;
use Illuminate\Support\Facades\Session;
use File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Berita::latest()->get();
        return view('admin.dashboard', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->content);
        // die();
        if($request->file('image')){
             $gambar = $request->image;
            $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();
            $data = $request->all();
            $data['slug'] =Str::slug($request->title);
            $data['image'] = $new_gambar;
            $data['users_id'] = Auth()->user()->id;

            Berita::create($data);
            $gambar->move('asset/image', $new_gambar);
            return redirect()->back();
        }
        Session::flash('gagal','Anda harus upload gambar');
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = Berita::Where('slug', $id)->first();

        return view('admin.edit-news', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $news = Berita::findOrFail($id);
        if($request->file('image')){
            $path = "asset/image/";
            File::delete($path  .  $news->image);
            $gambar = $request->image;
            $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();
            $gambar->move('asset/profil', $new_gambar);

            $data = $request->all();
            $data['slug']= Str::slug($request->title);
            $data['image'] = $new_gambar;
            $data['users_id'] = 1;

            $news->update($data);
            return redirect()->route('news.index');
        }
        else{
            $data = $request->all();
            $data['slug']= Str::slug($request->title);
            $data['users_id'] = 1;

            $news->update($data);
            return redirect()->route('news.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news =Berita::findOrFail($id);
        $news->delete();

        return redirect()->back();
    }
}