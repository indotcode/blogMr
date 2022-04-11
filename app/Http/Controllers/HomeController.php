<?php

namespace App\Http\Controllers;

use App\Events\PostHasViewed;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
            $data['posts'] = Post::orderBy('created_at', 'desc')->limit(6)->get();
        return view('index', $data);
    }

    public function articles(Request $request)
    {
        $query = Post::query();
        if($request->has('tag')){
            if(Tag::where('slug', $request->get('tag'))->first() == null) return abort(404);
            $tag = $request->get('tag');
            $query->whereHas('postAndTag', function ($query) use ($tag){
                $query->whereHas('tag', function ($query) use ($tag){
                    $query->where('slug', $tag);
                });
            });
        }
        $data = [];
        $data['posts'] = $query->orderBy('created_at', 'desc')->paginate(5)->withQueryString();
        $data['tags'] = Tag::all();
        return view('articles', $data);
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if($post == null) return abort(404);
        event(new PostHasViewed($post));
        $data = [];
        $data['post'] = $post;
        return view('post', $data);
    }
}
