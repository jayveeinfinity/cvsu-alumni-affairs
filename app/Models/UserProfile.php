<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id', 'alumni_id', 'first_name', 'last_name', 'phone_number', 'address', 'about', 'last_profile_update', 'last_reminder_sent_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alumni()
    {
        return $this->belongsTo(AlumniProfile::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class)
            ->orderByRaw('date_ended IS NULL DESC')
            ->orderBy('date_started', 'DESC');
    }

    public function work_experiences()
    {
        return $this->hasMany(WorkExperience::class)
            ->orderByRaw('date_ended IS NULL DESC')
            ->orderBy('date_started', 'DESC');
    }

    public function work_experiences_default()
    {
        return $this->hasMany(WorkExperience::class, 'user_profile_id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function isCurrentlyEmployed()
    {
        $latestWorkExperience = $this->work_experiences_default()->orderByDesc('date_started')->first();
        return $latestWorkExperience ? $latestWorkExperience->isCurrentlyEmployed() : false;
    }
}
