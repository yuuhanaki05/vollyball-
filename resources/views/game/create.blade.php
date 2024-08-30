<x-app-layout>
    <x-slot name="title">試合データ</x-slot>
    <h1>ポジション</h1>
    <form action="/games" method="POST">
        @csrf
        <div class="position-form">
            @for($i = 0; $i < 7; $i++)
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
        <div class="game-form">
            <div class="our-team">
                <h1>{{ Auth::user()->name }}</h1>
            </div>
            
            <div class="opponent">
                <input type="text" name="game[opponent_name]" placeholder="相手チーム名"/>
                <p class="name__error" style="color:red">{{ $errors->first('game.opponent_name') }}</p>
            </div>            

            <div class="sets">
                <button type="button" id="add-button">プラス</button>

                <!-- scoresの中に得点がセットが追加されるごとに挿入されていく -->
                <div id="scores"></div>
            </div>

            <div class="body">
                <input type="text" name="game[body]" placeholder="コメント"/>
            </div>
        </div>
        <input type="submit" value="保存"/>
    </form>
    <div class="footer">
        [<a href="/game">戻る</a>]
    </div>
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
</x-app-layout>