<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Project::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'sometimes|string',
            'slug' => 'required|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'is_public' => 'sometimes|boolean',
            'image_id' => 'sometimes|exists:images,id',
            'tags' => 'sometimes|array',
        ]);

        $project = Project::create($data);
        return $project->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return $project->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'sometimes|string',
            'content' => 'sometimes|string',
            'slug' => 'sometimes|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'is_public' => 'sometimes|boolean',
            'image_id' => 'sometimes|exists:images,id',
            'tags' => 'sometimes|array',
        ]);

        $project->update($data);
        return $project->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response(null, 204);
    }
}
