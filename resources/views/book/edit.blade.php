@extends('layouts.master')
@section('title')
    Edit Buku
@endsection
@section('content')
    <form action="/book/{{$book->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method ('put')
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
            <label  class="form-label">Genre</label>
            <select name="genre_id" id="" class="form-control">
                <option value="">-- pilih genre --</option>
                @forelse ($genre as $item)
                    @if($item->id == $book->genre_id)
                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                @empty
                    <option value="">genre belum ada</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label  class="form-label">Book Title</label>
            <input type="text" class="form-control" name="title" value="{{$book->title}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Summary</label>
            <textarea name="summary" class="form-control" cols="3" rows="3">{{$book->summary}}</textarea>
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label  class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" value="{{$book->stok}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection