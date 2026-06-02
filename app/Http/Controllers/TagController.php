<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.tags.index", [
            "tags" => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.tags.create", [
            "endpoint" => route("tags.store")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => ["required"],
            "slug" => ["required", "unique:tags,slug", "regex:/^[a-z0-9]+(?:(?:-)+[a-z0-9]+)*$/"],
            "description" => ["nullable", "string"],
            "is_public" => ["boolean"],
            "image" => ["nullable", "string"],
        ]);

        $data["is_public"] = $request->boolean("is_public");
        Tag::create($data);
        return redirect()->route("tags.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view("dashboard.tags.edit", [
            "tag" => $tag,
            "endpoint" => route("tags.update", $tag->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            "title" => ["required"],
            "slug" => ["required", "unique:tags,slug," . $tag->id , "regex:/^[a-z0-9]+(?:(?:-)+[a-z0-9]+)*$/"],
            "description" => ["nullable", "string"],
            "is_public" => ["boolean"],
            "image" => ["nullable", "string"],
        ]);

        $data["is_public"] = $request->boolean("is_public");
        $tag->update($data);
        $tag->save();
        return redirect($tag->get_edit_url());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        if($tag->canBeDeleted()) {
            $tag->delete();
            return redirect()->route("tags.index");
        }

        return back()->withErrors([
            "error" => "Para apagar a tag \"{$tag->title}\" precisa primeiro deletar as instancias a seguir: {$tag->getRelationedIntanceTitles()}"
        ]);

    }
}
