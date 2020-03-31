<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Discipline;
use Illuminate\Http\Request;

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

        return response()->json([
            'message' => 'User created.'
        ], 201);
    }
}
