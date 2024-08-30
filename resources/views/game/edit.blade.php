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
     <div class='content__opponent_name'>
        <h2>対戦相手</h2>
        <div class="opponent">
            <input type='text' name='game[opponent_name]' value="{{ $game->opponent_name }}">
                <p class="name__error" style="color:red">{{ $errors->first('game.opponent_name') }}</p>
            </div> 
    </div>
    <form action="/games/{{ $game->id }}" method="POST">
            @csrf
            @method('PUT')
        <div class="position-form">
            @for($i = 0; $i < 7; $i++)
            <select name='game[opponent_name]' value="{{ $player->name }}",name='game[opponent_position]' value="({{ $player->position }})">
            </select>
                <select name="position[{{ $i }}][player_id]">
                    @foreach($players as $player)
                        <option value={{ $player->id }}>
                            {{ $player->name }}({{ $player->position }})
                        </option>
                    @endforeach
                    <input type="hidden" name="position[{{ $i }}][initial_position]" value={{ $i }}>
                </select>
            @endfor
        </div>
    <div class="content">
            <div class='content__body'>
                <h2>試合結果</h2>
                <input type='text' name='game[body]' value="{{ $game->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>

 <script>
        // セット
        const addBtn = document.getElementById('add-button');       // プラスボタン

        let set = 0;        // セット数
        let score_me = 0;       // そのセットでの得点(me)
        let score_op = 0;       // そのセットでの得点(op)

        // 得点ボタン
        const btn_score_me = [];
        const btn_score_op = [];
        // 得点を表示しているdivタグ
        const div_score_me = [];
        const div_score_op = [];
        // フォームで送るinputタグ
        const input_score_me = [];
        const input_score_op = [];


        // 「プラス」ボタンが押された時
        addBtn.addEventListener('click', () => {
            // スコアを初期化
            score_me = 0;
            score_op = 0;

            set += 1;

            // divタグ作成
            const score_me_place = document.createElement("div");
            const score_op_place = document.createElement("div");

            // HTMLを挿入(me)
            score_me_place.innerHTML = `
                <button id="btn_score_me_${set}" type="button">me</button>
                <div id="div_score_me_${set}">0</div>
                <input type="hidden" id="input_score_me_${set}" name="set[${set}][our_points]">
            `;
            document.getElementById('scores').appendChild(score_me_place);

            // HTMLを挿入(op)
            score_op_place.innerHTML = `
                <button id="btn_score_op_${set}" type="button">op</button>
                <div id="div_score_op_${set}">0</div>
                <input type="hidden" id="input_score_op_${set}" name="set[${set}][opponent_points]">
            `;
            document.getElementById('scores').appendChild(score_op_place);

            // どのセットの得点かを取得
            btn_score_me[set] = document.getElementById(`btn_score_me_${set}`);
            div_score_me[set] = document.getElementById(`div_score_me_${set}`);
            input_score_me[set] = document.getElementById(`input_score_me_${set}`);
            btn_score_op[set] = document.getElementById(`btn_score_op_${set}`);
            div_score_op[set] = document.getElementById(`div_score_op_${set}`);
            input_score_op[set] = document.getElementById(`input_score_op_${set}`);

            btn_score_me[set].addEventListener('click', () => {
                score_me += 1;
                div_score_me[set].textContent = score_me;
                input_score_me[set].value = score_me;
            });

            btn_score_op[set].addEventListener('click', () => {
                score_op += 1;
                div_score_op[set].textContent = score_op;
                input_score_op[set].value = score_op;
            });
        });
    </script>
