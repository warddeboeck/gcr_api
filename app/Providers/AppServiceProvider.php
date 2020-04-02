<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use BeyondCode\Mailbox\InboundEmail;
use BeyondCode\Mailbox\Facades\Mailbox;
use Illuminate\Support\Facades\Mail;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Mailbox::to('{idea_code}@idea.globalcreativereview.com', function (InboundEmail $email, $idea_code) {
            $sender = $email->from();
            $user = User::where('email', $sender)->first();
            if ($user->role == 'creative') {
                $reviewers = $user->reviewers()->where('idea_uuid', $idea_code)->get();
                foreach ($reviewers as $reviewer) {
                    Mail::html($email->html(), function (\Illuminate\Mail\Message $message) use($email, $reviewer, $idea_code) {
                        $message->to($reviewer->email);
                        $message->subject($email->subject());
                        $message->from($idea_code.'@idea.globalcreativereview.com');
                        $message->attach($email->attachments());
                    });
                }
            } elseif ($user->role == 'reviewer') {
                $creative = $user->creatives()->where('idea_uuid', $idea_code)->first();
                Mail::html($email->html(), function (\Illuminate\Mail\Message $message) use($email, $creative, $idea_code) {
                    $message->to($creative->email);
                    $message->subject($email->subject());
                    $message->from($idea_code.'@idea.globalcreativereview.com');
                    $message->attach($email->attachments());
                });
            }
        });
    }
}
