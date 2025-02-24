<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $table = 'job_postings';

    protected $fillable = ['title', 'company', 'location', 'job_type', 'experience', 'salary_min', 'salary_max', 'job_description', 'apply_link'];
}
