<x-app-layout>
    <x-slot name="title">試合データ</x-slot>
    <h1>ポジション</h1>

    <form class="text" action="/games" method="POST">
        @csrf
       <div class="m-5">
           <div class="grid grid-cols-3 gap-4 justify-items-center p-4">
                @for($i = 0; $i <= 5; $i++)
                    <div class="w-1/3 flex justify-center">
                        <select class="text" name="position[{{ $i }}][player_id]">
                            @foreach($players as $player)
                                <!-- 通常の$playersの要素の場合に表示する要素 -->
                                <option value="{{ $player->id }}">
                                    {{ $player->name }} ({{ $player->position }})
                                </option>
                            @endforeach
                            <input type="hidden" name="position[{{ $i }}][initial_position]" value="{{ $i }}">
                        </select>
                    </div>
                @endfor
            </div>
            {{-- 外側のループの最後の反復でメッセージを表示 --}} 
            <div class="flex justify-center">
                <select name="position[6][player_id]">
                    @foreach($players as $player)
                        <!-- 通常の$playersの要素の場合に表示する要素 -->
                        <option value="{{ $player->id }}">
                            {{ $player->name }} ({{ $player->position }})
                        </option>
                    @endforeach
                    <input type="hidden" name="position[6][initial_position]" value="6">
                </select>
            </div>
        </div>
       {{-- <div class="h-56 grid grid-cols-3 gap-4 content-around">
            @for($i = 0; $i < 6; $i++)
                <select name="position[{{ $i }}][player_id]">
                    @foreach($players as $player)
                        <option value={{ $player->id }}>
                            {{ $player->name }}({{ $player->position }})
                        </option>
                    @endforeach
                    <input type="hidden" name="position[{{ $i }}][initial_position]" value={{ $i }}>
                </select>
            @endfor
        </div>--}}
         {{--<div class="h-20 grid grid-cols-3 gap-4 content-center">
            <div></div>
                <select name="position[ 6 ][player_id]">
                    @foreach($players as $player)
                        <option value={{ $player->id }}>
                            {{ $player->name }}({{ $player->position }})
                        </option>
                    @endforeach
                    <input type="hidden" name="position[6][initial_position]" value=6>
                </select>
                <div></div>
        </div>--}}
        <div class="flex justify-around">
            <div class="our-team">
                <h1>{{ Auth::user()->name }}</h1>
            </div>

            <div><svg class="h-8 w-8 text-slate-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="5" y1="12" x2="19" y2="12" /></svg></div>

            
            <div class="opponent">
                <input type="text" name="game[opponent_name]" placeholder="相手チーム名"/>
                <p class="name__error" style="color:red">{{ $errors->first('game.opponent_name') }}</p>

            </div>   
        </div>             

            <div class="flex justify-end">
                <button type="button" id="add-button"><svg class="h-8 w-8 text-slate-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </button>
            </div>
            
            
                <!-- scoresの中に得点がセットが追加されるごとに挿入されていく -->
                <div id="scores"></div>
            

            
                <textarea  class="mx-3 flex justify-center w-full h-40 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" name="game[body]" placeholder="コメント"/></textarea>
        </div>
        <div class="flex justify-center text-blue-600">
        <input type="submit" value="保存"/>
        </div>
    </form>
    <div class="flex justify-center text-fuchsia-600">

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
            const score_place = document.createElement("div");
            const arow_place = document.createElement("div");
            score_place.classList.add("flex", "justify-around");
            
            // HTMLを挿入(me)
           //<div class="flex justify-center ...">
           //<div>

            score_me_place.innerHTML = `
                <button id="btn_score_me_${set}" type="button">me</button>
                <div id="div_score_me_${set}">0</div>
                <input type="hidden" id="input_score_me_${set}" name="set[${set}][our_points]">
            `;

            score_place.appendChild(score_me_place);
           // </div>
            arow_place.innerHTML = `
                <svg class="h-8 w-8 text-slate-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="5" y1="12" x2="19" y2="12" /></svg>
            `;
            score_place.appendChild(arow_place);
           //<div>
           //<svg class="h-8 w-8 text-slate-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="5" y1="12" x2="19" y2="12" /></svg>
           //</div>
            // HTMLを挿入(op)
            //<div>
            score_op_place.innerHTML = `
            
                <button id="btn_score_op_${set}" type="button">op</button>
                <div id="div_score_op_${set}">0</div>
                <input type="hidden" id="input_score_op_${set}" name="set[${set}][opponent_points]">
            `;
            score_place.appendChild(score_op_place);
            document.getElementById('scores').appendChild(score_place);
            //</div>
            //</div>

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