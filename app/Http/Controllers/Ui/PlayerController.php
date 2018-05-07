<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::orderby('last_name', 'asc')->orderBy('first_name', 'asc')->get();

        return view('players.index')->with([
            'players' => $players
        ]);
    }
}
