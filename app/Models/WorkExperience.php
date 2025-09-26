<?php

namespace App\Models;

use App\Traits\UpdatesProfileTimestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExperience extends Model
{
    use HasFactory, UpdatesProfileTimestamp;

    protected $table = 'work_experiences';

    protected $fillable = [
        'user_profile_id', 'position', 'institution', 'employment_type', 'is_government', 'industry_id', 'date_started', 'date_ended', 'about'
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
