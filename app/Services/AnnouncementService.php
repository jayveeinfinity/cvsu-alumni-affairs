<?php

namespace App\Services;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnouncementService
{
    /**
     * Store a new announcement.
     */
    public function store(array $data): Announcement
    {
        $imagePath = $this->uploadImage($data['image'] ?? null);

        return Announcement::create([
            'admin_id'     => Auth::id(),
            'title'        => $data['title'],
            'content'      => $data['content'],
            'cover'   => $imagePath,
            'published_at' => $data['published_at'] ?? null,
            'is_active'    => $data['is_active'] ?? true,
        ]);
    }

    /**
     * Update an existing announcement.
     */
    public function update(Announcement $announcement, array $data): Announcement
    {
        if (isset($data['image'])) {
            if ($announcement->cover && Storage::disk('public')->exists($announcement->cover)) {
                Storage::disk('public')->delete($announcement->cover);
            }

            $announcement->cover = $this->uploadImage($data['image']);
        }

        $announcement->update([
            'title'        => $data['title'],
            'content'      => $data['content'],
            'published_at' => $data['published_at'] ?? $announcement->published_at,
            'is_active'    => $data['is_active'] ?? $announcement->is_active,
        ]);

        return $announcement;
    }

    /**
     * Handle image upload process.
     */
    protected function uploadImage($image = null): ?string
    {
        if (!$image) {
            return null;
        }

        return $image->store('announcements', 'public');
    }
}