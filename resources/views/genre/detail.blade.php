@extends('layouts.master')
@section('title')
    Detail
@endsection

@section('content')
    <h3>{{$genre->name}}</h3>
    <p>{{$genre->description}}</p>
    <hr>
    @forelse($genre->books as $item)
        <div class="row">
                <div class="col-4">
                    <div class="card">
                    <img src="{{asset('image/'.$item->image)}}" class="card-img-top" height="300px"alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
                        <div class="d-grid gap-2">
                            <a href="/book/{{$item->id}}" class="btn btn-success" style="background-color: #BDE3C3; border-color: #28a745; color:black">Read More</a>
                        </div>
                        @auth
                        @if(Auth::user()->role === 'admin')
                        <div class="row mt-3">
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <a href="/book/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                                </div>
                            </div>
                            <div class="col">
                                <form action="/book/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="d-grid gap-2">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                        @endauth
                    </div>
                    </div>
                </div>
        @empty
            <h4>Tidak ada buku dalam genre ini.</h4>
        @endforelse
        </div>      
    <a href="/genre" class="btn btn-outline-success btn-md my-3">Kembali</a>
    @endsection