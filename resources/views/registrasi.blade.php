@extends('layouts.layout')

@section('title', 'Registrasi')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <form action="{{ route('PostRegis') }}" method="POST">
                @csrf
                <div class="login " style="margin-top:20vh">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary ">Registrasi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
