<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlumniProfile extends Model
{
    use HasFactory;

    protected $table = 'alumni_profiles';

    protected $fillable = [
       'student_number', 'first_name', 'last_name', 'sex', 'course', 'year_graduated'
    ];

    public function isMailable() {
        $profile = $this->findProfile($this->id);

        if($profile) {
            $emailSent = DB::table('email_sent')->where('user_id', $profile->user->id)->get();
            if($emailSent->count() > 0) {
                return false;
            }
        }
        
        return $profile && !$profile->work_experiences()->exists();

    }
    
    public function findProfile($alumni_id)
    {
        return UserProfile::where('alumni_id', $alumni_id)->first();
    }

    public function getAlumniStatus($alumni_id) {
        $profile = $this->findProfile($alumni_id);

        $status = '<span class="badge badge-pill badge-info">No account</span>';
        if ($this->email_sent_at && Carbon::parse($this->email_sent_at)->addYear()->isPast() && !$this->profiles()->exists()) {
            $status = '<span class="badge badge-pill badge-danger">Not tracked</span>';
        } elseif ($profile && !$profile->work_experiences()->exists()) {
            $status = '<span class="badge badge-pill badge-primary">Pending</span>';
        } elseif ($profile && $profile->isCurrentlyEmployed()) {
            $status = '<span class="badge badge-pill badge-success">Employed</span>';
        } elseif ($profile && !$profile->isCurrentlyEmployed()) {
            $status = '<span class="badge badge-pill badge-warning">Unemployed</span>';
        }
        return $status;
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
}
