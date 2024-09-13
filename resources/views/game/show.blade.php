<x-app-layout>
    <x-slot name="header">試合詳細(VS {{ $game->opponent_name }})</x-slot>
    <x-slot name="title">試合詳細_{{ $game->opponent_name }}</x-slot>


    <div class="flex justify-center text-red-500">
    <h1>対戦相手</h1>
    </div>
    <div>
    <h1 class="flex justify-center">
        {{ $game->opponent_name }}
    </h1> 
    </div>
    <div class="flex justify-center text-lime-500">
        <h2>ポジション</h2>
    </div>
    <div class="m-5 grid grid-cols-3 gap-4 justify-items-center p-4">
        @foreach($positions as $index => $position)
        <div class="">
        @if($index < 6)  
            <div class="flex justify-center">
                <div>{{ $position->player->name }}({{ $position->player->position }})</div>
            </div>
        @endif
        </div>
        @if($index == 6)
            <div class="flex justify-center">
                {{ $position->player->name }}({{ $position->player->position }})
            </div>
        @endif
        @endforeach
    </div>
    <div class="flex justify-center text-violet-600">
    <h2>セット詳細</h2>
    </div>
    @foreach($sets as $set)
    <div class="flex justify-evenly">

    <h2 class="sets">
        {{ $set->set_index }}
    </h2>
    <h2 class="sets">
        {{ $set->our_points }}
    </h2>

    <svg class="h-8 w-8 text-slate-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="5" y1="12" x2="19" y2="12" /></svg>
    <h2 class="sets">
        {{ $set->opponent_points }}
    </h2>
    </div >

    @endforeach
        <div class="mx-3 text-amber-500">
            <h3>振り返りコメント</h3>
            <div></div>
        </div>
        <div class="mx-3">
            <p>{{ $game->body }}</p>    
        </div>

    <div class="flex justify-center text-fuchsia-600">
        <a href="/game">戻る</a>
    </div>
    <div class="flex justify-center text-blue-600">

        <a href="/games/{{ $game->id }}/edit">edit</a>
    </div>
</x-app-layout>