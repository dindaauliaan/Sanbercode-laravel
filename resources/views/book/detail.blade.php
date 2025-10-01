@extends('layouts.master')
@section('title')
    Detail Buku
@endsection
@section('content')
    <img src="{{asset('image/'.$book->image)}}"alt="..."height="400px">
    <h1 class="text-primary">{{$book->title}}</h1>
    <p>{{$book->summary}}</p>
    <p>Stok : {{$book->stok}}</p>
@endsection