<x-app-layout>
    <x-slot name="header">試合データ</x-slot>
    <x-slot name="title">試合データ</x-slot>
    <h1>試合結果一覧</h1>
    
   
        
    <h1>試合結果</h1>
        <div class='text-blue-700'>
            <a href='/games/create'>create</a>
        </div>
        <div>
            @foreach ($games as $game)
            <div class='opponent_name'>
               <h2 class='opponet_name'>
                   <a href="/games/{{ $game->id }}">{{ $game->opponent_name }}</a>
               </h2>
                @csrf
                @method('DELETE')
                <div class="text-rose-500">
                    <button type="button" onclick="deletePost({{ $game->id }})">delete</button> 
                </div>
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
        
    
    