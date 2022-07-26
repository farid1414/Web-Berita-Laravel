@extends('layouts.layout')

@section('title', 'Form')

@section('content')
    <section class="section-menu">
        <div class="row">
            @if ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
            @endif
            <div class="col-md-10">
                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Topik</label>
                        <input type="text" class="form-control" name="topic">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Content</label>
                        <textarea name="content"></textarea>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <button type="submit" class="btn btn-success px-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('addon-javascript')
    <!-- Java script untuk CK Editor -->
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("content");
    </script>
    <!-- Akhir Java script untuk CK Editor -->
@endpush
