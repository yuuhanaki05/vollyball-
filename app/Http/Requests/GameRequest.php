<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    public function rules(): array
    {
      return [
            'game.opponent_name' => 'required|string|max:100',
            'game.body' => 'required|string|max:100',
        ];
    }
}
