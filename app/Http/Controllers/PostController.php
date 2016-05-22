<?php
namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
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
}