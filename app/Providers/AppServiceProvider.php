<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use BeyondCode\Mailbox\InboundEmail;
use BeyondCode\Mailbox\Facades\Mailbox;
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
            // $sender = $email->from();
            $user = User::where('email', 'w_de_boeck@hotmail.com')->first();
            $user->idea_url = 'test';
            $user->save();
            // $user = User::where('email', $sender)->first();
            // if ($user->role == 'creative') {
            //     $reviewers = $user->reviewers()->get();
            //     foreach ($reviewers as $reviewer) {
            //         $email->forward($reviewer->email);
            //     }

            // } elseif ($user->role == 'reviewer') {
            //     // todo
            // }
        });
    }
}
