<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GameRequest;

class GameController extends Controller
{
    public function index(Game $game)
    {
        return view('game.index')->with(['games' => $game->getPaginateByLimit()]);
    }
    public function show(Game $game)
    {
        return view('game.show')->with(['game' => $game]);
    }
    public function create(Game $game)
    {
        return view('game.create')->with(['games' => $game->getPaginateByLimit()]);
    }
    public function store(GameRequest $request, Game $game, Player $player)
    {
        $input = $request['game'];
        $input['user_id'] = Auth::id();
        $game->fill($input)->save();
        return redirect('/games/' . $game->id);
    }
    public function edit(Game $game)
    {
        return view('game.edit')->with(['game' => $game]);
    }
    public function update(GameRequest $request, Game $game)
    {
    $input_post = $request['game'];
    $game->fill($input_post)->save();

    return redirect('/games/' . $game->id);
    }
    public function delete(Game $game)
    {
        $game->delete();
        return redirect('/game');
    }
    
}
