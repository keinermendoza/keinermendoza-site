<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('assets.index', [
            'assets' => Asset::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.create', [
            'endpoint' => route("assets.store")
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required"],
            "file" => ["mimes:png,jpeg,bmp,gif,webp,pdf,csv,docx,xlsx"],
        ]);
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('assets', 'public');
            $type = Asset::getType($request->file('file'));

             Asset::create([
                "name" => $request->input("name"),
                "type" => $type,
                "path" => $path
            ]);
        }
       
        return redirect()->route('assets.index');
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        return view('assets.edit', [
            'asset' => $asset,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $data = $request->validate([
            "name" => ["required"],
        ]);

        $asset->update($data);
        $asset->save();
        return redirect($asset->get_edit_url());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        Storage::disk('public')->delete($asset->path);
        $asset->delete();
        return redirect()->route('assets.index');
    }
}
