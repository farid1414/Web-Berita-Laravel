@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <section class="section-menu">
        <div class="row">
            <div class="col-md-8">
                {{-- gambar berita --}}
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ '/asset/image/' . $news->image }}" class="image-news" alt="">

                    </div>
                </div>
                {{-- topik berita --}}
                <div class="topic-news">
                    <a href="">Laravel</a>
                </div>
                {{-- judul berita --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-news">
                            <h1>{{ $news->title }}</h1>
                        </div>
                    </div>
                </div>
                {{-- pebulis berita --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="author-news d-flex align-items-center mb-2">
                            <div class="profil-author">
                                <img src="{{ asset('img/avatar.png') }}" alt="">
                            </div>
                            <div class="name-author">{{ $news->users->name }}</div>
                            <div class="time-author">
                                <i class="fa fa-clock-o"> {{ $news->getNow() }}</i>
                            </div>
                            <div class="comment">
                                <i class="fa fa-comment"></i>
                                0 comment
                            </div>
                        </div>
                        <div class="content-news">
                            {!! $news->content !!}
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
@endsection
