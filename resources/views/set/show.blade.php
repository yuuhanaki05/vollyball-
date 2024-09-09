<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sets</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $set->set_index }}
        </h1>
        <div class="content">
            <div class="content__our_points">
                <h3>自チームポイント</h3>
                <p>{{ $set->our_points }}</p>    
            </div>
        </div>
        <div class="content">
            <div class="content__opponent_points">
                <h3>相手チームポイント</h3>
                <p>{{ $set->opponent_points }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/set">戻る</a>
        </div>
        <div class="edit">
            <a href="/sets/{{ $set->id }}/edit">edit</a>
        </div>
    </body>
</html>