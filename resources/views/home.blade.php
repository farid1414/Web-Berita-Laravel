@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <section class="section-menu">
        <div class="row">
            @forelse ($news as $news)
                <div class="col-md-12">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center">
                                <img src="{{ '/asset/image/' . $news->image }}" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="{{ route('berita', $news->slug) }}">
                                        <h5 class="card-title">{{ $news->title }}</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to
                                            additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated
                                                {{ $news->created_at->diffForHumans() }}</small></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="">
                    <h1>Belum Ada Berita yang tayang</h1>
                </div>
            @endforelse
        </div>
    </section>

@endsection
