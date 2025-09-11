<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplicationAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'attempted_at',
    ];

    public $timestamps = true;

    protected $casts = [
        'attempted_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(JobPosting::class);
    }
}
