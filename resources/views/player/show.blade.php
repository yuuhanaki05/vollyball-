<x-app-layout>
    <div class="text-red-500">
        <h1>選手</h1>
    </div>    
        <h1 class="name">
            {{ $player->name }}
        </h1>
        <div class="content">
            <div class="text-lime-500">
                <h3>ポジション</h3>
            </div>    
            <div class="content__post">  
                <p>{{ $player->position }}</p>    
            </div>
        <div class="flex justify-center text-fuchsia-600">
            <a href="/player">戻る</a>
        </div>
        <div class="flex justify-center text-blue-600">
            <a href="/players/{{ $player->id }}/edit">edit</a>
        </div>
        </div>
</x-app-layout>        