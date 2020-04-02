<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Discipline;
use App\Mail\ReviewerCreated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:users',
            'role' => 'required|string|in:creative,reviewer',
            'function' => 'required|string',
            'agency' => 'required|string',
            'country' => 'required|string',
            'discipline' => 'required|string|exists:disciplines,name',
            'idea_url' => 'string',
        ]);

        $discipline = Discipline::where('name', $request->discipline)->first();

        $user = User::create([
            'discipline_id' => $discipline->id,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'function' => $request->function,
            'agency' => $request->agency,
            'country' => $request->country,
            'idea_url' => $request->idea_url,
            'ip' => $request->ip(),
        ]);

        $user->save();
        
        if ($user->role == "reviewer") {
            // Mail::to($user)->send(new ReviewerCreated($user));
        } elseif ($user->role == "creative") {
            // MATCHMAKING
            // get reviewers other disciplines
            $possibleReviewers = User::where('role', 'reviewer')->where('discipline_id', "!=", $user->discipline_id)->get();

            // get reviewers other continents
            $possibleReviewers = $possibleReviewers->filter(function($model){
                return $model->continent() != $user->continent();
            });

            // get reviewers with less than 3 matches within 24h
            $possibleReviewers = $possibleReviewers->filter(function($model){
                return $model->creatives->where('created_at','<', Carbon::now()->subDay())->count() < 3;
            });

            if ($possibleReviewers > 3) {
                $characters = '23456789abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
                $idea_uuid = substr(str_shuffle($characters), 0, 8);
                $reviewers = $possibleReviewers->random(3);
                $user->reviewers()->attach($reviewers, ['idea_uuid' => $idea_uuid]);
            } else {
                //put in random till count 3 from same discipline but other continent
            }

            // mail to creative
            // Mail::to($user)->send(new CreativeCreated($user));

            // mail to matched reviewers
            foreach ($reviewers as $reviewer) {
                // Mail::to($reviewer)->send(new CreativeMatchedToReviewer($reviewer));
            }
        }

        return response()->json([
            'message' => 'User created.'
        ], 201);
    }
}
