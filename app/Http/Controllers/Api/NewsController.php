<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Helpers\ApiFormatter;
use Exception;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => 'required',
                'image' => 'required',
                'topic' => 'required',
                'content' => 'required',
            ]);

            $news = Berita::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'image' => $request->image,
                'topic' => $request->topic,
                'content' => $request->content,
                'users_id' => 1,
            ]);

            $data = Berita::Where('id','=' ,$news->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }
            else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        }
        catch (Exception $error){
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Berita::Where('id','=' ,$id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }
            else{
                return ApiFormatter::createApi(400, 'Failed');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try{
            // $request->validate([
            //     'title' => 'required',
            //     'image' => 'required',
            //     'topic' => 'required',
            //     'content' => 'required',
            // ]);

            $news = Berita::findOrFail($id);

            $news->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'image' => $request->image,
                'topic' => $request->topic,
                'content' => $request->content,
                'users_id' => 1,
            ]);

            $data = Berita::Where('id','=' ,$news->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }
            else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        }
        catch (Exception $error){
            return ApiFormatter::createApi(400, 'Failed');
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
        //
    }
}