<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumniProfilesImport;
use App\Http\Controllers\MailController;
use App\Http\Requests\AlumniProfile\StoreRequest;
use App\Http\Requests\AlumniProfile\ImportRequest;
use App\Http\Requests\AlumniProfile\UdpateRequest;

class AlumniProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $course = $request->program ?? '';
        $year_graduated = $request->year ?? '';
        $alumniProfiles = AlumniProfile::when($course, function ($query, $course) use ($request) {
                if($course != "All") {
                    $query->where('course', $course);
                }
            })->when($year_graduated, function ($query, $year_graduated) use ($request) {
                if($year_graduated != "All") {
                    $query->where('year_graduated', $year_graduated);
                }
            })
            ->orderBy('last_name')->paginate(20);

        $programs = DB::table('alumni_profiles')
            ->select('course')
            ->groupBy('course')
            ->get();

        $filter_course = $course ?? '';
        $filter_year = $year_graduated ?? '';

        return view('admin.alumni-profiles.index', compact('alumniProfiles', 'programs', 'filter_course', 'filter_year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $alumniProfile = AlumniProfile::create($request->validated());

        return response()->json('success', Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlumniProfile $alumniProfile
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniProfile $alumniProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlumniProfile $alumniProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumniProfile = AlumniProfile::findOrFail($id);
        return response()->json($alumniProfile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlumniProfile $alumniProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UdpateRequest $request, $id)
    {
        $alumniProfile = AlumniProfile::findOrFail($id);
    
        $alumniProfile->update($request->validated());
    
        return response()->json(['success' => 'Alumni profile updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlumniProfile $alumniProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumniProfile $alumniProfile)
    {
        //
    }

    /**
     * Upload excel file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(ImportRequest $request)
    {
        $file = $request->file('alumni_file');
        $import = new AlumniProfilesImport();
        Excel::import($import, $file);

        $inserted = count($import->getInsertedRows());
        $duplicates = count($import->getDuplicateRows());
        $failed = count($import->getFailedRows());
        
        return response()->json(
            [
                'inserted' => $inserted,
                'duplicates' => $duplicates,
                'failed' => $failed,
                'failedRows' => $import->getFailedRows()
            ]
        , Response::HTTP_OK);
    }

    public function send($id) {
        $user = User::where('id', function ($query) use ($id) {
            $query->select('user_id')
                  ->from('user_profiles')
                  ->where('alumni_id', $id);
        })->first();

        if(!$user) {
            return 'Cant find user';
        }

        $name = ($user->profile->first_name ?? '') . ' ' . ($user->profile->last_name ?? '');

        $mailController = new MailController();
        $mailController->sendEmail($user->email, $name, $user->id);
    }
}
