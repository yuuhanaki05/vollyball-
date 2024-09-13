
<x-app-layout>
    <x-slot name="title">試合データ</x-slot>
    <div class="flex justify-center">
    <h1>ポジション</h1>
    </div>
    <form class="text" action="/games/{{ $game->id }}" method="POST">
        @csrf
        @method('PUT')
       <div class="m-5">
           <div class="grid grid-cols-3 gap-4 justify-items-center p-4">
               @foreach($game->positions as $index => $position)
                    @if($index == 6)
                        @break
                    @endif
                        <select class="w-1/3 flex justify-center" name="position[{{ $position->id }}][player_id]" value="{{ $position->player->id }}">
                            @foreach($players as $player)
                                <!-- 通常の$playersの要素の場合に表示する要素 -->
                                    <option value="{{ $player->id }}" {{ $position->player->id == $player->id ? 'selected' : '' }} >
                                        {{ $player->name }} ({{ $player->position }})
                                    </option>
                            @endforeach
                            <input type="hidden" name='position[{{ $game->position }}][initial_position]' value="{{ $game->position }}">
                        </select>
                @endforeach
            </div>
        <div>    
            {{-- 外側のループの最後の反復でメッセージを表示 --}} 
            <div class="flex justify-center">
                <select name="position[6][player_id]">
                    @foreach($players as $player)
                        <!-- 通常の$playersの要素の場合に表示する要素 -->
                        <option value="{{ $player->id }}" {{ $game->positions[6]->player->id == $player->id ? 'selected' : '' }}>
                            {{ $player->name }} ({{ $player->position }})
                        </option>
                    @endforeach
                    <input type="hidden" name='position[{{ $game->position }}][initial_position]' value="{{ $game->position }}">
                </select>
            </div>
        </div>
       </div> 
        <div class="flex justify-around">
            <div class="our-team">
                <h1>{{ Auth::user()->name }}</h1>
            </div>

            <div><svg class="h-8 w-8 text-slate-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="5" y1="12" x2="19" y2="12" /></svg></div>
            
            <div class="opponent">
                <input type="text" name='game[opponent_name]' value="{{ $game->opponent_name }}">
            </div>   
        </div>             

            {{--<div class="flex justify-end">
                <button type="button" id="add-button"><svg class="h-8 w-8 text-slate-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </button>
            </div>--}}
            
            
                <!-- scoresの中に得点がセットが追加されるごとに挿入されていく -->
                {{--<div id="scores"></div>--}}
            <input type='hidden' name='point[set]' value="{{ count($game->sets) }}">
            @foreach($game->sets as $index => $point)
                <div class="flex justify-center">
                    <div class='content__our_point'>
                        <input type='text' name='point[our_points_{{ $index }}]' value="{{ $point->our_points }}">
                    </div>
                    
                    <svg class="h-8 w-8 text-slate-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                    
                    <div class='content__opponent_point'>
                        <input type='text' name='point[opponent_points_{{ $index }}]' value="{{ $point->opponent_points }}">
                    </div>
                    <input type='hidden' name='point[set_id_{{ $index }}]' value="{{ $point->id}}">
                </div>
            @endforeach   

            <div class="w-full m-5">
                <textarea class="mx-3 flex justify-center w-full h-40 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" name='game[body]' value="{{ $game->body }}"></textarea>
            </div>
        <div class="flex justify-center text-blue-600">
        <input type="submit" value="保存">
        </div>
    </form>
</x-app-layout>

