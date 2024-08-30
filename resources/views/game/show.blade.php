<x-app-layout>
    <x-slot name="header">試合詳細(VS {{ $game->opponent_name }})</x-slot>
    <x-slot name="title">試合詳細_{{ $game->opponent_name }}</x-slot>
    
    <h1>対戦相手</h1>
    <h1 class="opponent_name">
        {{ $game->opponent_name }}
    </h1> 
    <h2>ポジション</h2>
    @foreach($positions as $position)
      <div class="player">
       {{-- <h1>{{ $position->initial_position }}</h1> --}}
        <h1>{{ $position->player->name }}</h1>
        <h1>{{ $position->player->position }}</h1>
      </div>
    @endforeach
    <h2>セット詳細</h2>
    @foreach($sets as $set)
    <h2 class="sets">
        {{ $set->set_index }}
    </h2>
    <h2 class="sets">
        {{ $set->our_points }}
    </h2>
    <h2 class="sets">
        {{ $set->opponent_points }}
    </h2>
    @endforeach
    <div class="content">
        <div class="content__post">
            <h3>振り返りコメント</h3>
            <p>{{ $game->body }}</p>    
        </div>
    <div class="footer">
        <a href="/game">戻る</a>
    </div>
    <div class="edit">
        <a href="/games/{{ $game->id }}/edit">edit</a>
    </div>
    </div>
</x-app-layout>