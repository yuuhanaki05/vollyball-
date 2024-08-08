<x-app-layout>
    <x-slot name="header">メモ</x-slot>
    <x-slot name="title">メモ</x-slot>
    <h1>メモ一覧</h1>

    
    <h1>Blog Name</h1>
    <div class='memos'>
        <a href='/memos/create'>create</a>
        @foreach ($memos as $memo)
            <div class='memo'>
                <h2 class='title'>
                    <a href="/memos/{{ $memo->id }}">{{ $memo->title }}</a>
                </h2>
                <p class='body'>{{ $memo->body }}</p>
                <form action="/memos/{{ $memo->id }}" id="form_{{ $memo->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $memo->id }})">delete</button>
                </form>
            </div>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $memos->links() }}
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