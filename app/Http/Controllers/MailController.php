<?php

namespace App\Http\Controllers;

use App\Mail\InviteEmail;
use App\Models\EmailSent;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail($recipient, $name, $id)
    {
        $details = [
            'title' => 'Sign Up for CvSU Alumni Affairs',
            'body' => 'Were excited to invite you to join our CvSU Alumni Affairs System. You can now sign up to http://cvsu-alumni-affairs.test/signup',
            'name' => $name
        ];
        Mail::to($recipient)->send(new InviteEmail($details));

        $emailSent = EmailSent::create([
            'user_id' => $id
        ]);

        if(!$emailSent) {
            return 'Something went wrong';
        }

        return 'Email sent successfully';
    }
}