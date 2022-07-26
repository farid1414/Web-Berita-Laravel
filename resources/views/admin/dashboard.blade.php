@extends('layouts.layout')

@section('title', 'Dashboard')


@section('content')
    <section class="section-menu">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('news.create') }}" class="btn btn-success px-4 mb-4">Tambah News</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Topik</th>
                            <th scope="col">Image</th>
                            <th scope="col">Content</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($news as $news)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $news->title }}</td>
                                <td>{{ $news->slug }}</td>
                                <td>{{ $news->topic }}</td>
                                <td class="align-items-center"> <img src="{{ '/asset/image/' . $news->image }}"
                                        width="50px"></td>
                                <td>{!! $news->content !!}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('news.show', $news->slug) }}" class=" btn bg-primary"><i
                                                class="fa fa-edit text-white "></i></a>
                                        {{-- <a href="" class="btn bg-danger"><i class="fa fa-trash text-white"></i></a> --}}
                                        <form action="{{ route('news.destroy', $news->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Anda Belum Mengunggah Berita</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
