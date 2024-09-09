<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
      return [
            'set.set-index' => 'required|string|max:100',
            'set.our_points' => 'required|string|max:100',
            'set.opponent_points' => 'required|string|max:100',
        ];
    
    }
}
