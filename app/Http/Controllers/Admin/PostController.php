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
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,png,bmp,tiff'
        ]);

        $filename = time() . '.' . $request->image->extension();

        $image_path = $request->file('image')->storeAs(
            'images',
            $filename,
            'public'
        );

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image_path,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('admin.edit_article', $post->id)->with('success', 'The article has been created.');
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
        $request->validate([
            'title' => 'required|max:50',
            'image' => 'required',
            'content' => 'required'
        ]);

        $article_id = $request->route('id');

        Post::findOrFail($article_id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image
        ]);

        return redirect()->back()->with('success', 'The article has been saved.');
    }
}
