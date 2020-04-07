<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\ThankYouMail;

class SendThankYouMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:sendthankyoumail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send thank you mail to all creatives and reviewers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $reviewers = User::where('role', 'reviewer')->get();
        foreach ($reviewers as $reviewer) {
            Mail::to($reviewer)->send((new ThankYouMail())->delay(10));
        }

        $creatives = User::where('role', 'creative')->get();
        foreach ($creatives as $creative) {
            Mail::to($creative)->send((new ThankYouMail())->delay(10));
        }
    }
}
