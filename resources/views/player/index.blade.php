<x-app-layout>
    <x-slot name="header">選手</x-slot>
    <x-slot name="title">選手</x-slot>
    <h1>選手一覧</h1>
    
    <h1>Player Name</h1>
        <div class='players'>
            <a href='/players/create'>create</a>
            @foreach ($players as $player)
                <div class='name'>
                <h2 class='name'>
                    <a href="/players/{{ $player->id }}">{{ $player->name }}</a>
                </h2>
                    <p class='position'>{{ $player->position }}</p>
                    <form action="/players/{{ $player->id }}" id="form_{{ $player->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $player->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $players->links() }}
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