<?php

namespace App\Http\Controllers;

use App\Models\JobView;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use App\Services\JobPostingService;
use App\Models\JobApplicationAttempt;

class JobController extends Controller
{
    public function __construct(
        protected JobPostingService $jobPostingService
    ) {}
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jobs = JobPosting::query();

        // Search term
        if ($request->filled('search')) {
            $jobs->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('job_description', 'like', '%' . $request->search . '%')
                ->orWhere('location', 'like', '%' . $request->search . '%');
        }

        // Experience filter
        if ($request->has('experience')) {
            $jobs->whereIn('experience', $request->experience);
        }

        // Job type filter
        if ($request->has('job_type')) {
            $jobs->whereIn('job_type', $request->job_type);
        }

        // Paginate results
        $jobs = $jobs
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        $filters = $this->jobPostingService->getFilters();
        
        return view('jobs.index', compact('jobs', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    /**
     * Record a job view (when user opens job detail/modal)
     */
    public function logView(Request $request, JobPosting $job)
    {
        $user = $request->user();

        $lastView = JobView::where('user_id', $user->id)
            ->where('job_id', $job->id)
            ->latest('viewed_at')
            ->first();

        if (!$lastView || $lastView->viewed_at->diffInSeconds(now()) > 60) {
            JobView::create([
                'user_id' => $user->id,
                'job_id' => $job->id,
                'viewed_at' => now(),
            ]);
        }

        return response()->json(['status' => 'ok']);
    }

    /**
     * Record an application attempt (when user clicks Apply + confirms)
     */
    public function logAttempt(Request $request, JobPosting $job)
    {
        $user = $request->user();

        JobApplicationAttempt::create([
            'user_id' => $user->id,
            'job_id' => $job->id,
            'attempted_at' => now(),
        ]);

        return response()->json(['status' => 'ok']);
    }
}
