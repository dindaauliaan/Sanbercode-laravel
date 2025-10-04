@extends('layouts.master')
@section('title')
    Register
@endsection
@section('content')
    <form action="/login" method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label  class="form-label">email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label  class="form-label">password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-outline-success">Login</button>
    </form>
@endsection