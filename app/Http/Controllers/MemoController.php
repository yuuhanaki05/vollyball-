<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MemoRequest;


class MemoController extends Controller
{
    public function index(Memo $memo)
    {
        return view('memo.index')->with(['memos' => $memo->getPaginateByLimit()]);
    }
    public function show(Memo $memo)
    {
        return view('memo.show')->with(['memo' => $memo]);
    }
    public function create()
    {
        return view('memo.create');
    }
    public function store(MemoRequest $request, Memo $memo)
    {
        $input = $request['memo'];
        $input['user_id'] = Auth::id();
        $memo->fill($input)->save();
        return redirect('/memos/' . $memo->id);
    }
    public function edit(Memo $memo)
    {
        return view('memo.edit')->with(['memo' => $memo]);
    }
    public function update(MemoRequest $request, Memo $memo)
    {
        $input_memo = $request['memo'];
        $memo->fill($input_memo)->save();
    
        return redirect('/memos/' . $memo->id);
    }
    public function delete(Memo $memo)
    {
        $memo->delete();
        return redirect('/memo');
    }
}
