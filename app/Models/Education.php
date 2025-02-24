<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

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
