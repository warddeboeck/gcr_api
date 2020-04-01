<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use BeyondCode\Mailbox\InboundEmail;
use BeyondCode\Mailbox\Facades\Mailbox;

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
        Mailbox::from('test@globalcreativereview.com', function (InboundEmail $email) {
            Log::debug("LUKT DIT?");
        });
    }
}
