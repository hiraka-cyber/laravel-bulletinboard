<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Commentsrequest;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(CommentsRequest $request)
    {
        $savedata = [
            'post_id' => $request->post_id,
            'name' => $request->name,
            'comment' => $request->comment
        ];

        $comment = new Comment;
        $comment->fill($savedata)->save();

        return redirect()->route('board.show', [$savedata['post_id']])->with('commentstatus','Posted Comment!');
    }
}
