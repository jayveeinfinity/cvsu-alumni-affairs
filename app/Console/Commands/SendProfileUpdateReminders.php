<?php

namespace App\Console\Commands;

use App\Models\UserProfile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProfileUpdateReminderMail;

class SendProfileUpdateReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alumni:send-profile-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send yearly profile update reminders to alumni';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $profiles = UserProfile::
            where(function ($query) {
                $query->whereNull('last_profile_update')
                      ->orWhere('last_profile_update', '<', now()->subYear());
            })
            ->where(function ($query) {
                $query->whereNull('last_reminder_sent_at')
                      ->orWhere('last_reminder_sent_at', '<', now()->subYear());
            })
            ->get();

        foreach ($profiles as $profile) {
            $user = $profile->user;

            if ($user && $user->email) {
                Mail::to($user->email)->queue(new ProfileUpdateReminderMail($user));

                $profile->update(['last_reminder_sent_at' => now()]);
            }
        }

        $this->info('Profile update reminders queued successfully!');
    }
}
