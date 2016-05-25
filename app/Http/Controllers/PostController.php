<?php
namespace App\Http\Controllers;


use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function getDashboard()
    {
        $posts= Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts'=> $posts]);
    }
    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'body'=> 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $message = 'Dogodila se greška!';
        if($request->user()->posts()->save($post)){
            $message = 'Status je uspješno objavljen!';
        }
        return redirect()->route('dashboard')->with(['message'=>$message]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message'=> 'Uspješno ste obrisali objavu!']);
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }
}