        <x-slot name="選手名">選手名</x-slot>

        <h1>選手名追加</h1>
        <form action="/players" method="POST">
            @csrf
            <div class="name">
                <h2>選手名</h2>
                <input type="text" name="player[name]" placeholder="選手名"/>
                <p class="name__error" style="color:red">{{ $errors->first('player.name') }}</p>
            </div>
            <div class="position">
                <h2>ポジション</h2>
                <select name="player[position]">
                  <option value="OH">OH</option>
                  <option value="S">S</option>
                  <option value="MB">MB</option>
                  <option value="L">L</option>
                  <option value="OP">OP</option>
                </select>
                
                <p class="position__error" style="color:red">{{ $errors->first('player.position') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/player">back</a>]</div>
    </body>
</html>