<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $table = 'work_experiences';

    protected $fillable = [
        'user_profile_id', 'position', 'institution', 'employment_type', 'industry_id', 'date_started', 'date_ended', 'about'
    ];

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }

    public function industry() {
        return $this->belongsTo(Industry::class);
    }

    /**
     * Check if the user is currently employed in their latest job.
     *
     * @return bool
     */
    public function isCurrentlyEmployed()
    {
        return $this->date_ended === null;
    }
}
