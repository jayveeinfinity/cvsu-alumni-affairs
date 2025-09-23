<?php

namespace App\Models;

use App\Traits\UpdatesProfileTimestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory, UpdatesProfileTimestamp;

    protected $table = 'skills';

    protected $fillable = ['user_profile_id', 'label'];

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }
}
