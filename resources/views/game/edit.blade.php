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
    <h1 class="対戦相手">編集画面</h1>
    @foreach()
        <div class="position">
            <p class="name__error" style="color:red">{{ $errors->first('game.name') }}</p>
            <select name="game[position]">
                <option value="OH">OH</option>
                <option value="S">S</option>
                <option value="MB">MB</option>
                <option value="L">L</option>
                <option value="OP">OP</option>
            </select>
            <input type="text" name="name" placeholder="選手名"/>
            <p class="name__error" style="color:red">{{ $errors->first('game.name') }}</p>
        </div>
    @endforeach
    <div class="content">
        <form action="/games/{{ $game->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__opponent_name'>
                <h2>対戦相手</h2>
                <input type='text' name='game[opponent_name]' value="{{ $game->opponent_name }}">
            </div>
            <div class='content__body'>
                <h2>試合結果</h2>
                <input type='text' name='game[body]' value="{{ $game->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
