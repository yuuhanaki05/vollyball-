<x-app-layout>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/memos/{{ $memo->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='memo[title]' value="{{ $memo->title }}">
            </div>
            <div class='content__body'>
                <h2>内容</h2>
                <input type='text' name='memo[body]' value="{{ $memo->body }}">
            </div>
            <dic class="text-blue-600 flex justify-center">
                <input type="submit" value="保存">
            </div>
        </form>
</x-app-layout>