<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'player.name' => 'required|string|max:100',
            'player.position' => 'required|string|max:100',
        ];
    }
}
