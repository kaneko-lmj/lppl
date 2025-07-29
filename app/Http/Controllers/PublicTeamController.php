<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class PublicTeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('public.team', compact('teams'));
    }
}
