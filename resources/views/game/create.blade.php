<x-slot name="試合データ">試合データ</x-slot>
    <style>
            .button-container {
                margin: 20px;
            }
            .score-button {
                display: block;
                margin: 5px;
            }
    </style>
    
<h1>選手名</h1>
<form action="/games" method="POST">
    @csrf
     @foreach ($games as $game)
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
    <div class="opponent_name">
        <h2>自チーム名</h2>
         <input type="text" name="game[name]" placeholder="自チーム名"/>
        <p class="name__error" style="color:red">{{ $errors->first('game.name') }}</p>
            <button id="score_me" type = "button">得点</button>
            <div id="counter_me">0</div>
             <div id="add_score_me_place"></div>
    </div>
        <h2>対戦相手</h2>
        <input type="text" name="game[opponent_name]" placeholder="対戦相手"/>
        <p class="opponent_name__error" style="color:red">{{ $errors->first('game.opponent_name') }}</p>
            <button id="score_op" type = "button">得点</button>
            <div id="counter_op">0</div>
        <div id="add_score_op_place"></div>
    </div>
    {{--<div class="body">
        <h2>試合結果</h2>
        <textarea name="game[body]" placeholder="試合結果"></textarea>
        <p class="body__error" style="color:red">{{ $errors->first('game.body') }}</p>
    </div>--}}
    <input type="submit" value="保存"/>
</form>
    <div class="button-container" id="button-container">
            <!-- 得点ボタンが追加されるコンテナ -->
    </div>
    <button id="add-button">プラス</button>
<div class="footer">
    [<a href="/game">戻る</a>]
</div>
<script>
    const score_me = document.getElementById('score_me');
    const score_op = document.getElementById('score_op');
    const counter_me = document.getElementById('counter_me');
    const counter_op = document.getElementById('counter_op');
    
    let count_me = 0;
    let count_op = 0;
    
    
    score_me.addEventListener('click', () => {
        count_me += 1;
        counter_me.textContent = count_me;
    });
    
    score_op.addEventListener('click', () => {
        count_op += 1;
        counter_op.textContent = count_op;
    });
    
    const addbutton = document.getElementById('add-button');
    let counter = 0;
    const score_me_list = [];
    const counter_me_list = [];
    const count_me_list = [];
    const score_op_list = [];
    const counter_op_list = [];
    const count_op_list = [];
    
    addbutton.addEventListener('click', () => {
        counter += 1;
        const add_score_me_place = document.createElement("div");
        const add_score_op_place = document.createElement("div");
        
        add_score_me_place.innerHTML = `<button id="score_me_${counter}" type = "button">得点</button><div id="counter_me_${counter}">0</div>`;
        document.getElementById('add_score_me_place').appendChild(add_score_me_place);
        
        add_score_op_place.innerHTML = `<button id="score_op_${counter}" type = "button">得点</button><div id="counter_op_${counter}">0</div>`;
        document.getElementById('add_score_op_place').appendChild(add_score_op_place);
        
        score_me_list[counter] = document.getElementById(`score_me_${counter}`);
        score_op_list[counter] = document.getElementById(`score_op_${counter}`);
        counter_me_list[counter] = document.getElementById(`counter_me_${counter}`);
        counter_op_list[counter] = document.getElementById(`counter_op_${counter}`);
        count_me_list[counter] = 0;
        count_op_list[counter] = 0;
        
        score_me_list[counter].addEventListener('click', () => {
            count_me_list[counter] += 1;
            counter_me_list[counter].textContent = count_me_list[counter];
        });
        
       score_op_list[counter].addEventListener('click', () => {
            count_op_list[counter] += 1;
            counter_op_list[counter].textContent = count_op_list[counter];
        });
    });
    {{--document.addEventListener('DOMContentLoaded', () => {
        // カウンター要素とボタン要素を取得
        const counterElement = document.getElementById('counter');
        const incrementButton = document.getElementById('btn');
    
        // 現在の数字を保持する変数
        let count = 0;
    
        // ボタンがクリックされたときの処理
        incrementButton.addEventListener('click', () => {
            count += 1;  // 数字を1増やす
            counterElement.textContent = count;  // 数字を更新
        });
    });
    document.addEventListener('DOMContentLoaded', () => {
        // カウンター要素とボタン要素を取得
        const counterElement = document.getElementById('counter');
        const incrementButton = document.getElementById('btn');
    
        // 現在の数字を保持する変数
        let count = 0;
    
        // ボタンがクリックされたときの処理
        incrementButton.addEventListener('click', () => {
            count += 1;  // 数字を1増やす
            counterElement.textContent = count;  // 数字を更新
        });
    });


            // 新しい得点ボタンを作成
            const newButton = document.createElement('button');
            newButton.className = 'score-button';
            newButton.textContent = `得点 ${buttonCount}`;

            // コンテナに新しい得点ボタンを追加
            document.getElementById('button-container').appendChild(newButton);
        });--}}
    </script>