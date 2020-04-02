<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Discipline::all();
    }
}
