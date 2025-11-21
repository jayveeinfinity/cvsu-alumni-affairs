<?php

namespace App\Http\Controllers;
use App\Services\R2StorageService;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct(
        protected R2StorageService $r2
    ) {}

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $path = 'uploads/' . $request->file('file')->getClientOriginalName();

        $this->r2->upload($path, $request->file('file'), 'public');

        return response()->json([
            'url' => $this->r2->getUrl($path),
        ]);
    }

    public function deleteFile($filename)
    {
        $path = 'uploads/' . $filename;
        $deleted = $this->r2->delete($path);

        return response()->json(['deleted' => $deleted]);
    }

    public function listFiles()
    {
        return response()->json($this->r2->listFiles('uploads'));
    }
}
