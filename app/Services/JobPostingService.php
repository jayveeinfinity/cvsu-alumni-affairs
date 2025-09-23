<?php

namespace App\Services;

use App\Models\JobPosting;

class JobPostingService
{
    public function __construct(
        protected JobPosting $jobPositing
    ) {}

    public function getFilters() {
        $jobTypeFilter = $this->jobPositing
            ->selectRaw('job_type, COUNT(*) as total')
            ->groupBy('job_type')
            ->orderByRaw('FIELD(job_type, "Full-time", "Part-time", "Contract")')
            ->get()
            ->pluck('total', 'job_type');

        $experienceFilter = $this->jobPositing
            ->selectRaw('experience, COUNT(*) as total')
            ->groupBy('experience')
            ->orderBy('experience', 'desc')
            ->get()
            ->pluck('total', 'experience');

            return  [
                'job_type' => $jobTypeFilter->toArray(),
                'experience' => $experienceFilter->toArray()
            ];
    }
}