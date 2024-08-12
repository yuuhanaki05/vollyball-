<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Players</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
<body>
    <h1 class="選手">編集画面</h1>
    <div class="content">
        <form action="/players/{{ $player->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__name'>
                <h2>選手名</h2>
                <input type='text' name='player[name]' value="{{ $player->name }}">
            </div>
            <div class='content__position'>
                <h2>ポジション</h2>
                <input type='text' name='player[position]' value="{{ $player->position }}">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>