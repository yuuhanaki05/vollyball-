<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Games</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @foreach
        <div class="position">
                
                <select name="game[position]">
                  <option value="OH">OH</option>
                  <option value="S">S</option>
                  <option value="MB">MB</option>
                  <option value="L">L</option>
                  <option value="OP">OP</option>
                </select>
                <input type="text" name="name" placeholder="選手名"/>
                 <p class="name__error" style="color:red">{{ $errors->first('game.name') }}</p>
         @endforeach
            </div>
        <h1 class="opponent_name">
            {{ $game->opponent_name }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>対戦相手</h3>
                <p>{{ $game->body }}</p>    
            </div>
        <div class="footer">
            <a href="/game">戻る</a>
        </div>
        <div class="edit">
            <a href="/games/{{ $game->id }}/edit">edit</a>
        </div>
        </div>
    </body>
</html>