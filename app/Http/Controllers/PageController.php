<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::when(request('keyword'), function ($q) {
            $keyword = request('keyword');
            $q->orWhere('title', 'like', "%$keyword%")
                ->orWhere('description', 'like', "%$keyword%");
        })
            ->latest('id')
            ->paginate(10)
            ->withQueryString();
        return view('index', compact('posts'));
    }

    public function detail($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('detail',compact('post'));
    }
}
