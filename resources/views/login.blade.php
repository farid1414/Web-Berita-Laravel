@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <form action="{{ route('postLogin') }}" method="POST">
                @csrf
                <div class="login " style="margin-top:20vh">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary ">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
