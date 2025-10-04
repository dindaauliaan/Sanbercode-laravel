@extends('layouts.master')
@section('title')
    Detail Buku
@endsection
@section('content')
    <img src="{{asset('image/'.$book->image)}}"alt="..."height="400px">
    <h1 class="text-primary">{{$book->title}}</h1>
    <p>{{$book->summary}}</p>
    <p>Stok : {{$book->stok}}</p>
    <hr>
        <h5>list komentar</h5>
        @forelse ($book->comments as $item)
        <div class="card my-3">
            <div class="card-header">
                {{$item->owner->name}}
            </div>
            <div class="card-body">
                <p class="card-text">{{$item->content}}</p>
            </div>
        </div>

        @empty
        <h1>tidak ada komentar</h1>
        @endforelse
    <hr>
    <h3>Comments</h3>
    @auth
    <form action="/comments/{{$book->id}}" method="POST" enctype="multipart/form-data">
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
            <textarea name="content" class="form-control" placeholder="Tulis komentar Anda di sini..." cols="3" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Buat Komentar</button>
    </form>
    @endauth
@endsection