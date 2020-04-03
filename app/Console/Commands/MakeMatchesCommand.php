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
        $creatives = User::where('role', 'creative')->has('reviewers', 0)->orderBy('created_at', 'asc')->get();

        foreach ($creatives as $creative) {
            // get reviewers other disciplines
            $possibleReviewers = User::where('role', 'reviewer')->get();

            // get reviewers other continents
            $possibleReviewers = $possibleReviewers->filter(function($model) use($creative) {
                return $model->continent() != $creative->continent();
            });

            // get reviewers with less than 3 matches within 24h
            $possibleReviewers = $possibleReviewers->filter(function($model){
                return $model->creatives()->wherePivot('created_at','>', Carbon::now()->subDay())->count() < 3;
            });

            $reviewers = collect();
            $displineIdFilter = array($creative->discipline_id);

            for ($i=0; $i < 3; $i++) { 
                $possibleReviewers = $possibleReviewers->filter(function($model) use($displineIdFilter){
                    return $model->where('discipline_id', '!=', $displineIdFilter);
                });
                $reviewer = $possibleReviewers->random(1)->first();
                array_push($displineIdFilter, $reviewer->discipline_id);
                $possibleReviewers = $possibleReviewers->filter(function($model) use($reviewer) {
                    return $model->continent() != $reviewer->continent();
                });
                if ($possibleReviewers->count() == 0) {
                    break;
                }
                $reviewers->add($reviewer);
            }
            $characters = '23456789ABCDEFGHIJKLMNPQRSTUVWXYZabcefghijkmnopqrstuvwxyz';
            $idea_uuid = substr(str_shuffle($characters), 0, 8);
            foreach ($reviewers as $reviewer) {
                $creative->reviewers()->attach($reviewer, ['idea_uuid' => $idea_uuid]);
            }
        }
    }
}
