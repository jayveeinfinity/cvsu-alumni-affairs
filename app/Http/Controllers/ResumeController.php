<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf|max:2048'
        ]);

        $user = Auth::user();

        // Check if user already has a resume
        if ($user->resume) {
            // Delete old file
            Storage::delete($user->resume->file_path);
            // Update record
            $path = $request->file('resume')->store('resumes', 'public');
            $user->resume->update(['file_path' => $path]);
        } else {
            // Store new file
            $path = $request->file('resume')->store('resumes', 'public');
            $user->resume()->create(['file_path' => $path]);
        }

        return response()->json([
            'message' => 'Resume uploaded successfully!',
            'file_path' => $path,
        ]);
    }
}
