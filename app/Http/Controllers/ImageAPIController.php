<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Resources\ImageResource;

class ImageAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ImageResource::collection(Image::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => ['required', 'image', 'max:2048'],
            'description' => ['required'],
            'is_public' => ['sometimes', 'boolean']
        ]);


        $data['resource'] = $request->file('file')->store('images', 'local');
        unset($data['file']);
        $image = Image::create($data);

        return $image->toResource()->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function public(Request $request, Image $image)
    {
        $currentUser = $request->user();
        if  ($image->is_public || $currentUser?->is_admin) {
            return response()->file(
                $image->getAssociatedImage()
                // Storage::disk('local')->path($image->resource)
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
        $data = $request->validate([
            'file' => ['sometimes', 'image', 'max:2048'],
            'description' => ['required'],
            'is_public' => ['sometimes', 'boolean']
        ]);

        if ($request->hasFile('file')) {
            $data['resource'] = $request->file('file')->store('images', 'local');
            unset($data['file']);
            $image->deleteAssociatedImage();
        }

        $image->update($data);
        return $image->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $image->deleteAssociatedImage();
        $image->delete();
        return response(null, 200);
    }
}
