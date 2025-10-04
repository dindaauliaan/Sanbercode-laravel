@extends('layouts.master')
@section('title')
    List Genre
@endsection

@section('content')

    <div class="container mt-4">
        @auth
        @if(Auth::user()->role === 'admin')
        <a href="/genre/create" class="btn btn-outline-success btn-md">Tambah</a>
        @endif
        @endauth
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-ligth">
                <tr>
                    <th>ID</th>
                    <th>Nama Genre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                    <form action="/genre/{{ $genre->id }}" method="POST">
                    <a href="/genre/{{ $genre->id }}" class="btn btn-success mx-3 btn-sm" style="background-color: #BDE3C3; border-color: #28a745; color:black">Detail</a>
                    @auth
                    @if(Auth::user()->role === 'admin')
                    <a href="/genre/{{ $genre->id }}/edit" class="btn btn-warning mx-3 btn-sm">Edit</a>
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger mx-3 btn-sm" value="Delete">
                    @endif
                    @endauth
                    </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection