<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Memos</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
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
                <h2>本文</h2>
                <input type='text' name='memo[body]' value="{{ $memo->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>