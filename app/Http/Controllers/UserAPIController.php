<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;


class UserAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'is_admin' => 'sometimes|boolean'
        ]);
        $user = User::create($data);
        return $user->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email',
            'is_admin' => 'sometimes|boolean',
            'password' => 'sometimes|string'
        ]);

        $user->update($data);
        return $user->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(null, 204);
    }
}
