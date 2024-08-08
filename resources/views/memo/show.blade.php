<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Memos</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $memo->title }}
        </h1>
        <div class="content">
            <div class="content__memo">
                <h3>本文</h3>
                <p>{{ $memo->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/memo">戻る</a>
        </div>
        <div class="edit">
            <a href="/memos/{{ $memo->id }}/edit">edit</a>
        </div>
    </body>
</html>