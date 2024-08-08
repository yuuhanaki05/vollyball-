<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'memo.title' => 'required|string|max:100',
            'memo.body' => 'required|string|max:4000',
        ];
    }
}