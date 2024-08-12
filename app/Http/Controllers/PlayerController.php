<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PlayerRequest;

class PlayerController extends Controller
{
    public function index(Player $player)
    {
        
        return view('player.index')->with(['players' => $player->getPaginateBylimit()]);  
    }
    public function show(Player $player)
    {
        return view('player.show')->with(['player' => $player]);
    }
    public function create()
    {
        return view('player.create');
    }
    public function store(PlayerRequest $request, Player $player)
    {
        $input = $request['player'];
         $input['user_id'] = Auth::id();
        $player->fill($input)->save();
        return redirect('/players/' . $player->id);
    }
    public function edit(Player $player)
    {
        return view('player.edit')->with(['player' => $player]);
    }
    public function update(PlayerRequest $request, Player $player)
    {
        $input_post = $request['player'];
        $player->fill($input_post)->save();
    
        return redirect('/players/' . $player->id);
    }
    public function delete(Player $player)
    {
        $player->delete();
        return redirect('/player');
    }
}
