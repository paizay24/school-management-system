<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Photo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $posts = Post::when(request('keyword'), function ($q) {
                $keyword  = request('keyword');
                $q->orWhere('title', 'like', "%$keyword%")
                    ->orWhere('description', 'like', "%$keyword%");
            })
                ->latest("id")
                ->paginate(10)
                ->withQueryString();
            return view('post.index', compact('posts'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description, 50, '...');
        $post->user_id = Auth::id();
        $post->save();

        //post save finished

        //photo saving
        //save to storage
        foreach ($request->photos as $photo) {

            $newName = uniqid() . "_post_photo." . $photo->extension();
            $photo->storeAs("public", $newName);
            //save to db
            $photo = new Photo();
            $photo->name = $newName;
            $photo->post_id = $post->id;
            $photo->save();
        }
        //photos save finsished
        return redirect()->route('post.index')->with(['status' => 'Post created successfully']);
    }



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description, 50, '...');
        $post->user_id = Auth::id();
        $post->update();

    // Check if photos are present and is an array
    if ($request->has('photos') && is_array($request->photos)) {
        foreach ($request->photos as $photo) {
            // Save to storage
            $newName = uniqid() . "_post_photo." . $photo->extension();
            $photo->storeAs("public", $newName);

            // Save to db
            $photo = new Photo();
            $photo->post_id = $post->id;
            $photo->name = $newName;
            $photo->save();
        }
    }
        //photos update finsished

        return redirect()->route('post.index')->with(['status' => 'Post updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $postTitle = $post->title;

        foreach ($post->photos as $photo) {
            //del form storage
            Storage::delete('public/' . $photo->name);
            //delete from db
            $photo->delete();
        }
        $post->delete();
        return redirect()->route('post.index')->with(['status' => "$postTitle deleted successfully"]);
    }
}
