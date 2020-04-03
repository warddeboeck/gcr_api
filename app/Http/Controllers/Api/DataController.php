<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function downloadReviewers()
    {
        $user = Auth::user();

        if($user->isAdmin()) {
            $csvExporter = new \Laracsv\Export();
            $reviewers = User::where('role', 'reviewer')->get();

            $csvExporter->beforeEach(function ($reviewer) {

            });

            $csvExporter->build($reviewers->sortBy('created_at'), [
                'name' => 'Name',
                // 'email' => 'Email',
                'function' => 'Function',
                'agency' => 'Agency',
                'country' => 'Country',
                'discipline.name' => 'Discipline',
                'created_at' => 'Joined on'
            ])->download();

        } else {
            return response()->json([
                'message' => 'You\'re not an admin'
            ], 401);
        }
    }

    public function downloadCreatives()
    {
        $user = Auth::user();

        if($user->isAdmin()) {
            $csvExporter = new \Laracsv\Export();
            $creatives = User::where('role', 'creative')->get();

            $csvExporter->beforeEach(function ($creative) {

            });

            $csvExporter->build($creatives->sortBy('created_at'), [
                'name' => 'Name',
                // 'email' => 'Email',
                'function' => 'Function',
                'agency' => 'Agency',
                'country' => 'Country',
                'discipline.name' => 'Discipline',
                'idea_url' => 'URL to idea',
                'created_at' => 'Joined on'
            ])->download();

        } else {
            return response()->json([
                'message' => 'You\'re not an admin'
            ], 401);
        }
    }
}
