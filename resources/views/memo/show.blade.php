<x-app-layout>
     <x-slot name="header">メモ</x-slot>
    <x-slot name="title">メモ</x-slot>
    <div class="bg-transparent">
        <div class="text-red-500">
                <h2>タイトル</h2>
        </div>
        <h1 class="title">
            {{ $memo->title }}
        </h1>
        <div class="text-lime-500">
            <h3>内容</h3>
        </div>
            <div class="content">
                <p>{{ $memo->body }}</p>    
            </div>
        </div>
        <div class="flex justify-center text-fuchsia-600">
            <a href="/memo">戻る</a>
        </div>
        <div class="flex justify-center text-blue-600">
            <a href="/memos/{{ $memo->id }}/edit">edit</a>
        </div>
    </div>
   </x-app-layout>