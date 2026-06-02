<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.posts.index", [
            "posts" => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.posts.create", [
            "endpoint" => route("posts.store"),
            "tags" => Tag::orderBy("title", "asc")->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => ["required"],
            "slug" => ["required", "unique:posts,slug", "regex:/^[a-z0-9]+(?:(?:-)+[a-z0-9]+)*$/"],
            "content" => ["nullable"],
            "is_public" => ["boolean"],
            "image" => ["nullable", "string"],
        ]);

        $data["is_public"] = $request->boolean("is_public");
        $post = Post::create($data);
        $post->tags()->sync($data["tags"] ?? []);

        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("dashboard.posts.edit", [
            "post" => $post,
            "tags" => Tag::orderBy("title", "asc")->get(),
            "endpoint" => route("posts.update", $post->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            "title" => ["required"],
            "slug" => ["required", "unique:posts,slug," . $post->id , "regex:/^[a-z0-9]+(?:(?:-)+[a-z0-9]+)*$/"],
            "content" => ["nullable"],
            "is_public" => ["boolean"],
            "image" => ["nullable", "string"],
            "tags" => ["nullable", "array"],
            "tags.*" => ["exists:tags,id"],
        ]);

        $data["is_public"] = $request->boolean("is_public");
        $post->update($data);
        $post->save();
        $post->tags()->sync($data["tags"] ?? []);
        return redirect($post->get_edit_url());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index");
    }
}
