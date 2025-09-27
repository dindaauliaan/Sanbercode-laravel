@extends('layouts.master')
@section('title')
    Form Genre
@endsection

@section('content')
    <form action="/genre/{{ $genre->id }}" method="POST">
        @csrf
        @method('PUT')
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
            <label  class="form-label" >Edit Genre</label>
            <input type="text" class="form-control" name="name"value="{{ $genre->name }}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="3" rows="3">{{ $genre->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection