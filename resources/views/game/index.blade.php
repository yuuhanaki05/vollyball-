<x-app-layout>
    <x-slot name="header">試合データ</x-slot>
    <x-slot name="title">試合データ</x-slot>
    <h1>試合結果一覧</h1>
    
   
        
    <h1>Game Result</h1>
        <div class='games'>
            <a href='/games/create'>create</a>
            @foreach ($games as $game)
            <div class='opponent_name'>
               <h2 class='opponet_name'>
                   <a href="/games/{{ $game->id }}">{{ $game->opponent_name }}</a>
               </h2>
                
                <p class='body'>{{ $game->body }}</p>
                <form action="/games/{{ $game->id }}" id="form_{{ $game->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $game->id }})">delete</button> 
                </form>
             </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $games->links() }}
        </div>
        <script>
        function deletePost(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
        </x-app-layout>
        
    
    