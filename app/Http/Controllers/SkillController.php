<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $skill = Skill::create([
            'user_profile_id' => auth()->user()->profile->id,
            'label' => $request->label,
        ]);

        return response()->json('success', Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->only([
            'skill_id',
            'label',
        ]);

        $request->validate([
            'label' => 'required|string|max:255',
        ]);
        
        $skill = Skill::findOrFail($data['skill_id']);
        $skill->update([
            'label' => $data['label'],
        ]);

        return response()->json([
            'message' => 'Skill updated successfully!',
            'skill'   => $skill,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
