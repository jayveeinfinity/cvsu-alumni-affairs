<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $noAccountCount = AlumniProfile::doesntHave('profile')->count();

        // $pendingCount = AlumniProfile::whereHas('profile', function ($query) {
        //     $query->doesntHave('emailSent');
        // })->count();

        // $employedCount = AlumniProfile::whereHas('profile', function ($query) {
        //     $query->whereHas('workExperiences', function ($query) {
        //         $query->whereNull('date_ended');
        //     });
        // })->count();

        // $unemployedCount = AlumniProfile::whereHas('profile', function ($query) {
        //     $query->whereDoesntHave('workExperiences', function ($query) {
        //         $query->whereNull('date_ended');
        //     });
        // })->count();
        $counts = DB::select("
            SELECT 
                COUNT(CASE WHEN up.id IS NULL THEN 1 END) AS no_account,
                COUNT(CASE WHEN up.id IS NOT NULL AND es.user_id IS NULL THEN 1 END) AS pending,
                COUNT(CASE WHEN EXISTS (
                    SELECT 1 
                    FROM work_experiences we 
                    WHERE we.user_profile_id = up.id 
                    AND we.date_ended IS NULL
                ) THEN 1 END) AS employed,
                COUNT(CASE WHEN NOT EXISTS (
                    SELECT 1 
                    FROM work_experiences we 
                    WHERE we.user_profile_id = up.id 
                    AND we.date_ended IS NULL
                ) AND up.id IS NOT NULL THEN 1 END) AS unemployed
            FROM alumni_profiles ap
            LEFT JOIN user_profiles up ON ap.id = up.alumni_id
            LEFT JOIN email_sent es ON up.id = es.user_id
        ")[0];

        $data = [
            'no_account' => $counts->no_account,
            'pending' => $counts->pending,
            'unemployed' => $counts->unemployed,
            'employed' => $counts->employed,
        ];

        $labels = array_keys($data);
        $counts = array_values($data);

        $chartData = [
            'labels' => [
                'No account',
                'Pending',
                'Unemployed',
                'Employed'
            ],
            'counts' => $counts
        ];

        return view('admin.reports.index', compact('chartData'));
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
}
