<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function newArticlePage()
    {
        return view('dashboard/new_article');
    }

    public function createArticle(Request $request)
    {
        $article = $request->validate([
            'title' => 'required|max:50',
            'image' => 'required',
            'content' => 'required'
        ]);

        $post = new Post;

        $post->title = $article['title'];
        $post->image = $article['image'];
        $post->content = $article['content'];
        $post->user_id = Auth::user()->id;

        if($post->save()) {
            return redirect()->route('admin.edit_article', $post->id)->with('success', 'The article has been created.');
        }
    }

    public function editArticlePage(int $id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        return view('dashboard/edit_article', [
            'post' => $post
        ]);
    }

    public function editArticle(Request $request)
    {
        $article = $request->validate([
            'title' => 'required|max:50',
            'image' => 'required',
            'content' => 'required'
        ]);

        $article_id = $request->route('id');

        $post = Post::find($article_id);
        $post->title = $article['title'];
        $post->image = $article['image'];
        $post->content = $article['content'];

        if($post->save()) {
            return redirect()->back()->with('success', 'The article has been saved.');
        }
    }
}
