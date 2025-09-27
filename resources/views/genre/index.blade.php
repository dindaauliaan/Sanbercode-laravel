@extends('layouts.master')
@section('title')
    List Genre
@endsection

@section('content')

    <div class="container mt-4">
        <a href="/genre/create" class="btn btn-primary btn-sm">Tambah</a>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
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
                    <a href="/genre/{{ $genre->id }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="/genre/{{ $genre->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">

                    </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection