<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Set;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SetRequest;
use App\Models\Game;

class SetController extends Controller
{
     public function index(Game $game)
    {
        return view('set.index')->with(['games' => $game->get()]);
    }
    public function show(Set $set)
    {
        return view('set.show')->with(['set' => $set]);
    }
    public function create(Game $game)
    {
        return view('set.create')->with(['games' => $game->get()]);
    }
    public function store(SetRequest $request, Set $set, Game $game)
    { 
        $input = $request['set'];
        //dd($request['set']['game_id']);
        $me_input = $request['me'];
        $op_input = $request['op'];
        for($i = 1; $i <= $input["set_index"]; $i++) {
            $set = new Set();
            $set->game_id = $input['game_id'];
            $set->set_index = $i;
            $set->our_points = $me_input[$i];
            $set->opponent_points = $op_input[$i];
            $set->save();
             
        }
        
        return redirect('/sets/' . $set->id);
    }
    public function edit(Request $request, Set $set, Game $game)
    { 
        $input = $request['set'];
        //dd($request['set']['game_id']);
        $me_input = $request['me'];
        $op_input = $request['op'];
        for($i = 1; $i <= $input["set_index"]; $i++) {
            $set = new Set();
            $set->game_id = $input['game_id'];
            $set->set_index = $i;
            $set->our_points = $me_input[$i];
            $set->opponent_points = $op_input[$i];
            $set->save();
             
        }
        
        return redirect('/sets/' . $set->id);
    }
    public function update(SetRequest $request, Set $set)
    {
        $input_set = $request['set'];
        $set->fill($input_set)->save();
    
        return redirect('/sets/' . $set->id);
    }
    public function delete(Set $set)
    {
        $set->delete();
        return redirect('/set');
    }
}
