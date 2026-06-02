<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.projects.index', [
            'projects' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.projects.create', [
            "tags" => Tag::orderBy('title', 'asc')->get(),
            "endpoint" => route("projects.store"),
            "imagesEndpoint" => route("images.index")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => ["required"],
            "slug" => ["required", "unique:projects,slug", "regex:/^[a-z0-9]+(?:(?:-)+[a-z0-9]+)*$/"],
            "content" => ["nullable"],
            "is_public" => ["boolean"],
            "image" => ["nullable", "string"],
            "tags" => ["nullable", "array"],
            "tags.*" => ["exists:tags,id"],
        ]);

        $data["is_public"] = $request->boolean("is_public");
        $project = Project::create($data);
        $project->tags()->sync($data["tags"] ?? []);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', [
            'project' => $project,
            "tags" => Tag::orderBy('title', 'asc')->get(),
            'endpoint' => route("projects.update", $project->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            "title" => ["required"],
            "slug" => ["required", "unique:projects,slug," . $project->id , "regex:/^[a-z0-9]+(?:(?:-)+[a-z0-9]+)*$/"],
            "content" => ["nullable"],
            "is_public" => ["boolean"],
            "image" => ["nullable", "string"],
            "tags" => ["nullable", "array"],
            "tags.*" => ["exists:tags,id"],
        ]);

        $data["is_public"] = $request->boolean("is_public");
        $project->update($data);
        $project->save();
        $project->tags()->sync($data["tags"] ?? []);
        return redirect($project->get_edit_url());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
