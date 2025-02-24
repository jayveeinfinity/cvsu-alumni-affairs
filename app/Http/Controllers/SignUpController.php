<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Education;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SignUp\StoreRequest;
use App\Models\AlumniProfile;

class SignUpController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // $userRequest = UserRequest::create($request->validated());
        $alumni_id = AlumniProfile::where('student_number', $request->student_number)->first()->id;
        $validated = $request->validated();
        
        DB::beginTransaction();
        try {
            // Create User
            $user = User::create([
                'email' => $validated['email']
            ]);

            // Create User Profile
            $userProfile = UserProfile::create([
                'user_id' => $user->id,
                'alumni_id' => $alumni_id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name']
            ]);

            $course = $validated['course'] == 'BSIT' ? 'Bachelor of Science in Information Technology (BSIT)' : 'Bachelor of Science in Computer Science (BSCS)';

            // Add Educational Background
            $education = Education::create([
                'user_profile_id' => $userProfile->id,
                'level' => 'college',
                'institution' => 'Cavite State University Main Campus',
                'degree' => $course,
                'date_ended' => $validated['date_ended']
            ]);

            DB::commit();

            return redirect()->route('signup.create')->with('success', 'Successfully created.');
        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('signup.create')->withErrors('Something when wrong! Try again.');
        }
    }
}
