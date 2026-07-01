<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class ImageAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Asset::images()->get();
        $images = $images->map(function($item) {
            $item->publicImage = $item->image_url;
            return $item;
        });
        return $images;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "file" => ["image", "max:2048"],
            "name" => ["required"]
        ]);

        $path = $request->file('file')->store('assets', 'public');
        Asset::create([
            "name" => $request->input("name"),
            "path" => $path,
            "type" => "image"
        ]);
        return response()->json([
            "message" => "imagem subida com sucesso",
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
