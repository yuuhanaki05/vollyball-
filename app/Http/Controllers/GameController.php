<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GameRequest;
use App\Models\Player;
use App\Models\Position;
use App\Models\Set;
use App\Http\Requests\SetRequest;

class GameController extends Controller
{
    public function index(Game $game)
    {
        return view('game.index')->with(['games' => $game->getPaginateByLimit()]);
    }
    public function show(Game $game, Set $set, Position $position)
    {
        $sets = $set->where('game_id', $game->id)->get();
        $positions = $position->where('game_id', $game->id)->get();
        return view('game.show')->with(['game' => $game, 'sets' => $sets, 'positions' => $positions]);
    }
    public function create(Game $game)
    {
        $players = Player::where('user_id', Auth::id())->get(); 
        return view('game.create')->with(['games' => $game->getPaginateByLimit(), 'players' => $players]);
    }
    public function store(GameRequest $request, Set $set, Game $game)
    {
              // 送られてきたリクエストの確認（アプリが動くためにはコメントアウトか削除すること）

        //dd($request);
        // リクエストからそれぞれ分類
        $input_game = $request['game'];
        $input_position = $request['position'];
        $input_set = $request['set'];
        //dd($input_set);

        // gamesのデータ作成
        $game = new Game();
        $game->user_id = Auth::id();
        $game->fill($input_game)->save();
        $game_id = $game->id;
        //dd($game_id);

        // positionsのデータの作成

        for($i = 0; $i <= 6; $i++) {
            $position = new Position();
            $position->game_id = $game->id;
            $position->player_id = $input_position[$i]['player_id'];
            $position->initial_position = $input_position[$i]['initial_position'];
            $position->save();
        }
        //dd($game_id);
            $input = $request['set'];
            //dd($request['set']['game_id']);
            $me_input = $request['me'];
            $op_input = $request['op'];
            // setsのデータの作成
           //dd($input);
        //for($i = 1; $i <= $input; $i++) {
        foreach ($input as $index => $point) {
            //dd($point);
            $set = new Set();
            $set->game_id = $game_id;
            $set->set_index = $index;
            $set->our_points = $point['our_points'];
            $set->opponent_points = $point['opponent_points'];
            $set->save();
        }
        $players = $position->where('game_id', $game_id)->select('player_id', 'initial_position')->get();
        return redirect('/games/' . $game->id)->with(compact('set','players','game'));
    }
    public function edit(Game $game)
    {

        $players = Player::where('user_id', Auth::id())->get(); 
        //$players = $position->where('game_id', $game_id)->select('player_id', 'initial_position')->get();
        //dd(array_slice($game->positions->toArray(), 0, 6, true));
        //foreach(array_slice($game->positions->toArray(), 0, 6, true) as $position)
        //{dd($position['id']);}
        //dd($game->sets);
        return view('/game/edit')->with(compact('players','game'));
    }
    public function update(GameRequest $request, Game $game, Set $set)
    {
    $input_post = $request['game'];
    //dd($request['point']);
    $game->fill($input_post)->save();
    
    $input_point = $request['point'];
    for($i = 0; $i < $input_point['set']; $i++){
        $set_id = $input_point["set_id_$i"];
        $set = $set->where('id', '=', $set_id)->first();
        $set->our_points = $input_point["our_points_$i"];
        $set->opponent_points = $input_point["opponent_points_$i"];
        $set->save();
    }

    return redirect('/games/' . $game->id);
    }
    public function delete(Game $game)
    {
        $game->delete();
        return redirect('/game');
    }
    
}
