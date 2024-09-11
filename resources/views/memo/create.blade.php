<x-app-layout>
     <x-slot name="flex justify-center">メモ</x-slot>
        <h1>メモ作成画面</h1>
        <div class ="title">
        <form class="w-full" action="/memos" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
            </div>
            <div class="title">
                <input type="text" name="memo[title]" placeholder="タイトル"/>
                <p class="title__error" style="color:red">{{ $errors->first('memo.title') }}</p>
            </div>
            <div class="title">
                <h2>内容</h2>
            </div>
            <div class="w-full">    
                <textarea clas="mx-3 flex justify-center w-full h-40 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" name="memo[body]" placeholder="メモ"></textarea> 
                <p class="body__error" style="color:red">{{ $errors->first('memo.body') }}</p>
            </div>
            <div class="flex justify-center text-blue-600">
            <input type="submit" value="保存"/>
            </div>
        </form>
            <div class="flex justify-center text-fuchsia-600">[<a href="/memo">戻る</a>]</div>
    </div>
    </x-app-layout>