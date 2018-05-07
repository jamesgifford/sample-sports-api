<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderby('name', 'asc')->get();

        return view('teams.index')->with([
            'teams' => $teams
        ]);
    }

    /**
     * Display details for a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $team->load('players');

        return view('teams.show')->with([
            'team' => $team
        ]);
    }
}
