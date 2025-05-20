<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseRequest extends FormRequest
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

        if($this->exercise){
            $exercise_id = ','.$this->exercise->id;
        }else{
            $exercise_id = '';
        }

        return [
            'name' => 'required',
            'category' => 'required|exists:categories,id',
            'description' => 'required',
            'slug' => 'required|unique:exercises,slug'.$exercise_id,
        ];
    }
}
