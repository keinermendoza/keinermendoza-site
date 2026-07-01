<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;


class SkillAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Skill::all()->toResourceCollection();
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
            'svg' => 'sometimes|string'
        ]);
        $skill = Skill::create($data);
        return $skill->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return $skill->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'title' => 'sometimes|string',
            'description' => 'sometimes|string',
            'is_public' => 'sometimes|boolean',
            'svg' => 'sometimes|string'
        ]);

        $skill->update($data);
        return $skill->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response(null, 204);
    }
}
