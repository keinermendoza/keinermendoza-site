<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tag::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'sometimes|string',
            'is_public' => 'sometimes|boolean',
        ]);

        $tag = Tag::create($data);
        return $tag->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return $tag->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'title' => 'sometimes|string',
            'description' => 'sometimes|string',
            'is_public' => 'sometimes|boolean',
        ]);

        $tag->update($data);
        return $tag->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response(null, 204);
    }
}
