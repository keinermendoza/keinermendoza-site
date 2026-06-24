<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Image::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "file" => ["image", "max:2048"],
            "description" => ["required"],
            "is_public" => ["sometimes", "boolean"]
        ]);


        $data["resource"] = $request->file('file')->store('images', 'local');
        unset($data["file"]);

        $image = Image::create($data);

        return $image->toResource()->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function public(Image $image)
    {
        if ($image->is_public) {
            return response()->file(
                Storage::disk('local')->path($image->resource)
            );
        } else {
            return response()->json([
                'message' => 'Imagem não encontrada.'
            ], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
