<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Player Name</h1>
        <form action="/players" method="POST">
            @csrf
            <div class="name">
                <h2>Player_name</h2>
                <input type="text" name="player[name]" placeholder="選手名"/>
                <p class="name__error" style="color:red">{{ $errors->first('player.name') }}</p>
            </div>
            <div class="position">
                <h2>Position</h2>
                <textarea name="player[position]" placeholder="ポジション"></textarea>
                <p class="position__error" style="color:red">{{ $errors->first('player.position') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/player">back</a>]</div>
    </body>
</html>