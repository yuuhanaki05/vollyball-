<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Sets</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/sets/{{ $set->id }}" method="POST">
            @csrf
            @method('PUT')
             <h1>ゲーム</h1>
                <select name="set[game_id]">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}">{{$game->opponent_name}}</option>
                    @endforeach
                </select>
            <div class='content__set_index'>
                <h2>セット詳細</h2>
                <input type='hidden' name='set[set_index]' value="{{ $set->set_index }}">
                 <button id="set" type = "button">第1セット</button>
                    <div id="counter_set"></div>
                    <div id="add_set_place"></div>
            </div>
            <div class='content__our_points'>
                <h2>自チームポイント</h2>
                <input type='button' name='set[our_points]' value="{{ $set->our_points }}">
                    <input type="number" name = "me[1]"/>
                    <div id="add_score_me_place"></div>
            </div>
            <div class='content__opponent_points'>
                <h2>相手チームポイント</h2>
                <input type='button' name='set[opponent_points]' value="{{ $set->opponent_points }}">
                    <input type="number" name = "op[1]"/>
                    <div id="add_score_op_place"></div>
            </div>
            <input type="submit" value="保存">
        </form>
        <div class="button-container" id="button-container">
            <!-- 得点ボタンが追加されるコンテナ -->
    </div>
    <button id="add-button">プラス</button>
    </div>
</body>
</html>
 <script>
    const score_me = document.getElementById('score_me');
    const score_op = document.getElementById('score_op');
    const counter_me = document.getElementById('counter_me');
    const counter_op = document.getElementById('counter_op');
    
    let count_me = 0;
    let count_op = 0;
    
    
    
    {{--score_me.addEventListener('click', () => {
        count_me += 1;
        counter_me.textContent = count_me;
    });
    
    score_op.addEventListener('click', () => {
        count_op += 1;
        counter_op.textContent = count_op;
    });--}}
    
    const addbutton = document.getElementById('add-button');
    let counter = 1;
    const score_me_list = [];
    const counter_me_list = [];
    const count_me_list = [];
    const score_op_list = [];
    const counter_op_list = [];
    const count_op_list = [];
    const set_list = [];
    const counter_set_list = [];
    const count_set_list = [];
    
    addbutton.addEventListener('click', () => {
        counter += 1;
        document.getElementById("set_value").value = counter;
        const add_score_me_place = document.createElement("div");
        const add_score_op_place = document.createElement("div");
        const add_set_place = document.createElement("div");
        
        add_score_me_place.innerHTML = `<input type="number" name = "me[${counter}]"/>`;
        document.getElementById('add_score_me_place').appendChild(add_score_me_place);
        
        add_score_op_place.innerHTML = `<input type="number" name = "op[${counter}]"/>`;
        document.getElementById('add_score_op_place').appendChild(add_score_op_place);
        
        add_set_place.innerHTML = `<button id="set_${counter}" type = "button">第${counter}セット</button>`;
        document.getElementById('add_set_place').appendChild(add_set_place);
        
        score_me_list[counter] = document.getElementById(`score_me_${counter}`);
        score_op_list[counter] = document.getElementById(`score_op_${counter}`);
        counter_me_list[counter] = document.getElementById(`counter_me_${counter}`);
        counter_op_list[counter] = document.getElementById(`counter_op_${counter}`);
        count_me_list[counter] = 0;
        count_op_list[counter] = 0;
        set_list[counter] = document.getElementById(`set_${counter}`);
        counter_set_list[counter] = document.getElementById(`counter_set_${counter}`);
        count_set_list[counter] = 1;
        
        score_me_list[counter].addEventListener('click', () => {
            count_me_list[counter] += 1;
            counter_me_list[counter].textContent = count_me_list[counter];
        });
        
       score_op_list[counter].addEventListener('click', () => {
            count_op_list[counter] += 1;
            counter_op_list[counter].textContent = count_op_list[counter];
        });
        
        set_list[counter].addEventListener('click', () => {
            count_set_list[counter] += 1;
            counter_set_list[counter].textContent = count_set_list[counter];
        });
        
    });
    
    </script>