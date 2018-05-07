<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $players = Player::orderby('last_name', 'asc')->orderby('first_name', 'asc');

        if ($team = (array) $request->input('team')) {
            $players = $players->where('team_id', $team['id']);
        }

        $players = $players->get();

        return response()->json([
            'players' => $players
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
        $playerInput = (array)$request->input('player');
        $teamInput = (array)$request->input('team');

        $player = new Player;
        $player->first_name = $playerInput['first_name'];
        $player->last_name = $playerInput['last_name'];

        if ($teamInput) {
            $team = Team::where('slug', $teamInput['slug'])->first();
            
            $player->team_id = $team->id;
        }

        $player->save();

        return response()->json([
            'player' => $player
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player     $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return response()->json([
            'player' => $player
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player->first_name = $request->input('first_name');
        $player->last_name = $request->input('last_name');
        $player->save();

        return response(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return response(null, 204);
    }
}
