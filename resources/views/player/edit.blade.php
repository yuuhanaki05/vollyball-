<x-app-layout>
    <h1 class="選手">編集画面</h1>
    <div class="content">
        <form action="/players/{{ $player->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='text-red-500'>
                <h2>選手名</h2>
            </div>
            <div>
                <input type='text' name='player[name]' value="{{ $player->name }}">
            </div>
            <div class='text-lime-500'>
                <h2>ポジション</h2>
            </div>
            <div>
                <select name='player[position]' value="{{ $player->position }}">
                  <option value="OH">OH</option>
                  <option value="S">S</option>
                  <option value="MB">MB</option>
                  <option value="L">L</option>
                  <option value="OP">OP</option>
                </select>
            </div>
            <div class="text-blue-600 flex justify-center">
                <input type="submit" value="保存">
            </div>
        </form>
   </x-app-layout>