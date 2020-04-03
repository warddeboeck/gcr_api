<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\UpdateEarlyReviewer;
use App\User;

class UpdateEarlyReviewers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:updateearlyreviewers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to the reviewers that signed in before creatives could join';

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
            Mail::to($reviewer)->send((new UpdateEarlyReviewer($reviewer))->delay(10));
        }
    }
}
