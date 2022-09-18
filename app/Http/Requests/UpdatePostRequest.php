<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'nombre' => 'required|unique:posts,name,'.$this->post->id,
            'status' => 'required|in:1,2',
            'imagen' => 'image',
        ];

        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'categoria' => 'required',
                'tags' => 'required',
                'resumen' => 'required',
                'cuerpo' => 'required',
            ]);
        }
        
        return $rules;
    }
}
