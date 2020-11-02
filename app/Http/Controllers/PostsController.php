<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(Request $request)
    {
      $posts = Post::get();
      
      return view('board.index', ['posts' => $posts]);
    }

    public function show(Request $request, $id)
    {
      $post = Post::findOrFail($id);

      return view('board.show',['post' => $post]);
    }

    public function create()
    {
      return view('board.create');
    }

    public function store(PostRequest $request)
    {
      $savedata = [
        'name' => $request->name,
        'subject' => $request->subject,
        'message' => $request->message,
      ];

      $post = new Post;
      $post->fill($savedata)->save();

      return redirect('board')->with('poststatus','New post!');
    }

    public function edit($post_id)
    {
      $post = Post::findOrFail($post_id);
      return view('board.edit', ['post' => $post]);
    }

    public function update(PostRequest $request)
    {
      $savedata = [
        'name' => $request->name,
        'subject' => $request->subject,
        'message' => $request->message,
      ];

      $post = new Post;
      $post->fill($savedata)->save();

      return redirect('/board')->with('poststatus', 'Edited Post!');
    }

    public function destroy($id)
    {
      $post = Post::findOrFail($id);

      $post->comments()->delete();
      $post->delete();

      return redirect('/board')->with('poststatus', 'Deleted Post!');
    }
}
