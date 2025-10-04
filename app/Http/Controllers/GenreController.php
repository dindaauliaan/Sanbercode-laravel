<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = DB::table('genres')->get();
        return view('genre.index', compact('genres'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|unique:genres|min:5',
        'description' => 'required',
        ]);
        DB::table('genres')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/genre');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $genre = Genre::find($id);
        return view('genre.detail', ['genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $genre = DB::table('genres')->find($id);
        return view('genre.edit', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:genres,name,'.$id.'|min:5',
            'description' => 'required',
        ]);
        DB::table('genres')
            ->where('id',$id)
            ->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/genre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = DB::table('genres')->where('id', $id)->delete();
        return redirect('/genre');
    }
}
