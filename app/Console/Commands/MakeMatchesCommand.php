<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\User;
use Carbon\Carbon;

class MakeMatchesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:makematches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make matches of 1 creative with 3 reviewers';

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
        // get all creatives with no matches yet
        $creatives = User::where('role', 'creative')->has('reviewers', 0)->get();

        foreach ($creatives as $creative) {
            // get reviewers other disciplines
            $possibleReviewers = User::where('role', 'reviewer')->where('discipline_id', "!=", $creative->discipline_id)->get();

            // get reviewers other continents
            $possibleReviewers = $possibleReviewers->filter(function($model) use($creative) {
                return $model->continent() != $creative->continent();
            });

            // get reviewers with less than 3 matches within 24h
            $possibleReviewers = $possibleReviewers->filter(function($model){
                return $model->creatives->where('created_at','<', Carbon::now()->subDay())->count() < 3;
            });

            $characters = '23456789ABCDEFGHIJKLMNPQRSTUVWXYZabcefghijkmnopqrstuvwxyz';
            $idea_uuid = substr(str_shuffle($characters), 0, 8);
            if ($possibleReviewers->count() > 2) {
                $reviewers = $possibleReviewers->random(3);
                $creative->reviewers()->attach($reviewers, ['idea_uuid' => $idea_uuid]);
            } else {
                //put in random till count 3 from same discipline but other continent
                $reviewers = $possibleReviewers;
                $creative->reviewers()->attach($reviewers, ['idea_uuid' => $idea_uuid]);
            }

            // mail to creative
            // Mail::to($creative)->send(new ReviewerMatched($creative));

            // mail to matched reviewers
            // foreach ($reviewers as $reviewer) {
                // Mail::to($reviewer)->send(new CreativeMatched($reviewer));
            // }
        }
    }
}
