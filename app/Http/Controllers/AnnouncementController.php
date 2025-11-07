<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\AnnouncementService;
use App\Presenters\CustomPaginationPresenter;
use App\Http\Requests\Announcement\StoreRequest;
use App\Http\Requests\Announcement\UpdateRequest;

class AnnouncementController extends Controller
{
    protected AnnouncementService $service;

    public function __construct(AnnouncementService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request) {
        $announcements = Announcement::orderBy('label')->paginate(20);

        $links = new CustomPaginationPresenter($announcements);

        return view('admin.announcements.index', compact('announcements', 'links'));
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->id;

        $announcement = Announcement::find($id)->first();

        return response()->json([
            'data'    => $announcement,
        ], Response::HTTP_OK);
    }

    /**
     * Store a new announcement.
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $announcement = $this->service->store($request->validated());

        return response()->json([
            'message' => 'Announcement created successfully!',
            'data'    => $announcement,
        ], Response::HTTP_CREATED);
    }

    /**
     * Update an existing announcement.
     */
    public function update(UpdateRequest $request, Announcement $announcement): JsonResponse
    {
        $updated = $this->service->update($announcement, $request->validated());

        return response()->json([
            'message' => 'Announcement updated successfully!',
            'data'    => $updated,
        ], Response::HTTP_OK);
    }
}
