<x-app-layout>
    <x-slot name="header">セット</x-slot>
    <x-slot name="title">セット</x-slot>
    <h1>セット一覧</h1>
    
        <h1>Sets</h1>
    <div class='m-5 '>
        <a href='/sets/create'>create</a>
        @foreach ($games as $game)
            <div class=' bg-orange-300'>
                <h2 class='set_index'>
                    <a href="/sets/{{ $game->id }}">{{ $game->set_index }}</a>
                </h2>
                <div>
                    @foreach($game->sets as $set)
                        <div class="flex">
                            <p class='our_points'>{{ $set->our_points }}</p>
                            <form action="/sets/{{ $set->id }}" id="form_{{ $set->id }}" method="post">
                            <p class='opponent_points'>{{ $set->opponent_points }}</p>
                            <form action="/sets/{{ $set->id }}" id="form_{{ $set->id }}" method="post">    
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deletePost({{ $set->id }})">delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
   {{-- <div class='paginate'>
        {{ $games->links() }}
    </div>--}}
    
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
</x-app-layout>