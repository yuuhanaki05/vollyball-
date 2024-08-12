<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/memos" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="memo[title]" placeholder="タイトル"/>
                <p class="title__error" style="color:red">{{ $errors->first('memo.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="memo[body]" placeholder="メモ"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('memo.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
            <div class="back">[<a href="/memo">back</a>]</div>
    </body>
</html>