<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create()
    {
        $data = new Comment();
        $data->article_id = request()->article_id;
        $data->content = request()->content;
        $data->save();

        return back();
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return back()->with('info', 'Comment deleated');
    }
}
