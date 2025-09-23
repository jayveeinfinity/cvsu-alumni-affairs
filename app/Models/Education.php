<?php

namespace App\Models;

use App\Traits\UpdatesProfileTimestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory, UpdatesProfileTimestamp;

    protected $table = 'educations';

    protected $fillable = [
        'user_profile_id', 'level', 'institution', 'degree', 'date_started', 'date_ended', 'honors'
    ];

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }
    
    public function getHonorsAttribute($value)
    {
        if($value) {
            return explode(',', $value);
        }

        return [];
    }
}
