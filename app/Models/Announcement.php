<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'title',
        'content',
        'cover',
        'published_at',
        'is_active',
    ];

    public function admin() {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
