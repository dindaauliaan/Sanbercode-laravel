@extends('layouts.master')
@section('title')
    Buat Profile
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form action="/profile" method="POST">
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
            <label  class="form-label">Age</label>
            <input type="number" class="form-control" name="age">
        </div>
        <div class="mb-3">
            <label  class="form-label">Address</label>
            <textarea name="address" class="form-control" cols="3" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-outline-success">Submit</button>
    </form>
@endsection