<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $book_id)
    {
        $request->validate([
            'content'=>'required',
        ]);
        $userId = Auth::id();
        $store = new Comment;
        $store->content = $request->input('content');
        $store->user_id = $userId;
        $store->book_id = $book_id;
        $store->save();
        return redirect('/book/'.$book_id);
    }
}
