<x-slot name="セット詳細">セット</x-slot>
        
        <h1>セット</h1>
        <form action="/sets" method="POST">
            @csrf
            <h1>ゲーム</h1>
        <select name="set[game_id]">
            @foreach($games as $game)
                <option value="{{ $game->id }}">{{$game->opponent_name}}</option>
            @endforeach
        </select>
    <div class="set_index">
        <h2>セット詳細</h2>
            <button id="set" type = "button">第1セット</button>
            <div id="counter_set"></div>
            <div id="add_set_place"></div>
            <input type="hidden" id="set_value" name="set[set_index]" value=1></input>
    </div>    
    <div class="opponent_name">
        <h2>自チーム名</h2>
        <input type="text" name="set[name]" placeholder="自チーム名"/>
        <p class="name__error" style="color:red">{{ $errors->first('set.name') }}</p>
            <input type="number" name = "me[1]"/>
            <div id="add_score_me_place"></div>
    </div>
        <h2>対戦チーム名</h2>
            <input type="text" name="set[opponent_name]" placeholder="対戦チーム名"/>
            <p class="opponent_name__error" style="color:red">{{ $errors->first('set.opponent_name') }}</p>
            <input type="number" name = "op[1]"/>
            <div id="add_score_op_place"></div>
    </div>
            <input type="submit" value="保存"/>
        </form>
            <div class="button-container" id="button-container">
            <!-- 得点ボタンが追加されるコンテナ -->
    </div>
    <button id="add-button">プラス
    </button>
            <div class="back">[<a href="/set">back</a>]</div>
    
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
