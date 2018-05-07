<?php

namespace App\Http\Controllers\Api;

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

        return response()->json([
            'teams' => $teams
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = new Team;
        $team->name = $request->input('name');
        $team->save();

        return response()->json([
            'team' => $team
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team     $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return response()->json([
            'team' => $team
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team     $team
     * @return \Illuminate\Http\Response
     */
    public function showWithPlayers(Team $team)
    {
        $team->load('players');
        $team->players->makeHidden('team_id');

        return response()->json([
            'team' => $team
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->name = $request->input('name');
        $team->save();

        return response(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return response(null, 204);
    }
}
