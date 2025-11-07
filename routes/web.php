<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobPostingController;
use App\Http\Controllers\Admin\AlumniProfileController;
use App\Http\Controllers\AnnouncementController;

Route::get('/', function () {
    return view('landing');
})->name('landing');
Route::get('/signin', function () {
    return view('auth.signin');
})->name('signin');
Route::get('/login', function () {
    return view('auth.signin');
})->name('login');

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
Route::get('/signout', [AuthController::class, 'logout'])->name('signout');

Route::get('/signup', [SignUpController::class, 'create'])->name('signup.create');
Route::post('/signup', [SignUpController::class, 'store'])->name('signup.store');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs');

// Route::get('/approved/test', function() {
//     return view('mails.user_requests.welcome');
// });

// Route::get('/approved', function() {
//     $mailController = new MailController();
//     $mailController->sendWelcomeEmail('jayveeinfinity@gmail.com', 'John Vincent Bonza');
// });

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->group(function () {
        Route::get('/', function() {
            return redirect()->route('admin.dashboard');
        });
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/alumni-profiles', [AlumniProfileController::class, 'index'])->name('admin.alumni-profiles');
        Route::post('/alumni-profiles/import', [AlumniProfileController::class, 'import'])->name('admin.alumni-profiles.import');
        Route::post('/alumni-profiles', [AlumniProfileController::class, 'store'])->name('admin.alumni-profiles.store');
        Route::get('/alumni-profiles/{id}', [AlumniProfileController::class, 'edit'])->name('admin.alumni-profiles.edit');
        Route::post('/alumni-profiles/{id}', [AlumniProfileController::class, 'update'])->name('admin.alumni-profiles.update');
        Route::get('/job-postings', [JobPostingController::class, 'index'])->name('admin.job-postings');
        Route::post('/job-postings/store', [JobPostingController::class, 'store'])->name('admin.job-postings.store');
        Route::post('/job-postings/import', [JobPostingController::class, 'import'])->name('admin.job-postings.import');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/industries', [IndustryController::class, 'index'])->name('admin.industries');
        Route::post('/industries', [IndustryController::class, 'store'])->name('admin.industries.store');
        Route::get('/announcements', [AnnouncementController::class, 'index'])->name('admin.announcements.index');
        Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('admin.announcements.show');
        Route::post('/announcements', [AnnouncementController::class, 'store'])->name('admin.announcements.store');
        Route::put('/announcements/{announcement}', [AnnouncementController::class, 'update'])->name('admin.announcements.update');
        Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports.index');

        Route::post('/alumni-profiles/send-email/{id}', [AlumniProfileController::class, 'send'])->name('admin.alumni-profiles.send-email');
    });

    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', function() {
            return redirect()->route('user.profile.index');
        });
        Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit/{user_id}', [UserProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/edit/{user_id}', [UserProfileController::class, 'update'])->name('profile.update');
        Route::post('/edit/education/store', [EducationController::class, 'store'])->name('profile.education.store');
        Route::post('/edit/work-experience/store', [WorkExperienceController::class, 'store'])->name('profile.work_experience.store');
        Route::post('/edit/skill/store', [SkillController::class, 'store'])->name('profile.skill.store');
        Route::post('/edit/skill/update', [SkillController::class, 'update'])->name('profile.skill.update');
        Route::post('/edit/resume/upload', [ResumeController::class, 'store'])  ->name('profile.resume.upload');
    });

    Route::prefix('jobs')->name('jobs.')->group(function () {
        Route::post('/{job}/view', [JobController::class, 'logView'])->name('view');
        Route::post('/{job}/attempt', [JobController::class, 'logAttempt'])->name('attempt');
    });
});