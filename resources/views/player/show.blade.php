<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="name">
            {{ $player->name }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>ポジション</h3>
                <p>{{ $player->position }}</p>    
            </div>
        <div class="footer">
            <a href="/player">戻る</a>
        </div>
        <div class="edit">
            <a href="/players/{{ $player->id }}/edit">edit</a>
        </div>
        </div>
    </body>
</html>