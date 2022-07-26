<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\User;
class HomeController extends Controller
{
    public function index(){
        $news = Berita::latest()->get();
        return view('home', compact('news'));
    }
    public function berita($id){
        $news =Berita::Where('slug', $id)->first();
        return view('berita', compact('news'));
    }
}