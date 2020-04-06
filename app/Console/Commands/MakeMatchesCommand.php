<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\User;
use Carbon\Carbon;
use App\Mail\ReviewersMatchedToCreative;

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
        $creatives = User::where('role', 'creative')->where('deleted_at', NULL)->has('reviewers', 0)->orderBy('created_at', 'asc')->get();

        foreach ($creatives as $creative) {

            // get all reviewers
            $possibleReviewers = User::where('role', 'reviewer')->where('deleted_at', NULL)->get();

            $reviewers = collect();

            $allPossibleReviewers = $possibleReviewers;
            $continentFilter = array($creative->continent());

            for ($i=0; $i < 3; $i++) {

              // filter out reviewers from same or already used continent
              $possibleReviewers = $possibleReviewers->filter(function($model) use($continentFilter){
                return !in_array($model->continent(), $continentFilter);
              });

              $reviewer = false;

              for ($j=1; $j < 4; $j++) {

                // get all reviewers with $j creatives assigned
                $selectedReviewers = $possibleReviewers->filter(function($model) use($j){
                  return $model->creatives()->wherePivot('created_at','>', Carbon::now()->subWeek())->count() < $j;
                });
                if ($selectedReviewers->count() > 0) {
                  $reviewer = $possibleReviewers->random(1)->first();
                  array_push($continentFilter, $reviewer->continent());
                  break;
                }

              }

              // check if we were able to find an eligible review in previous loop
              if (!$reviewer) {
                // log that were unable to find a match!
                break;
              }

              $reviewers->add($reviewer);
            }

            if ($reviewers->count() != 3) {
              break;
            }

            $characters = '0123456789';
            $idea_uuid = substr(str_shuffle($characters), 0, 8);

            foreach ($reviewers as $reviewer) {
                $creative->reviewers()->attach($reviewer, ['idea_uuid' => $idea_uuid]);
            }
            Mail::to($creative)->send(new ReviewersMatchedToCreative($creative, $idea_uuid));
        }

    }
}
