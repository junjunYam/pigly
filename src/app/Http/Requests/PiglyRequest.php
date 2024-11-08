<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PiglyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => ['required'],
            'weight' => ['required', 'numeric', 'regex:/\A\d{1,3}(\.\d{0,1})?\z/'],
            'target_weight' => ['required', 'regex:/\A\d{1,3}(\.\d{0,1})?\z/'],
            'calories' => ['required', 'numeric'],
            'exercise_time' => ['required'],
            'exercise_content' => ['max:120'],
        ];
    }

    public function messages()
    {
        return [
            'weight.required' => ':attributeを入力して下さい',
            'weight.numeric' => '数字で入力して下さい',
            'weight.regex' => '4桁の数字、または小数点1桁で以下で入力して下さい',
            'target_weight.required' => ':attributeを入力して下さい',
            'target_weight.numeric' => '数字で入力して下さい',
            'target_weight.regex' => '4桁の数字、または小数点1桁で以下で入力して下さい',
            'calories.required' => ':attributeを入力して下さい',
            'calories.numeric' => '数字で入力して下さい',
            'exercise_time.required' => ':attributeを入力して下さい',
            'exercise_content.max' => ':max文字以内で入力して下さい',
        ];
    }

    public function attributes()
    {
        return [
            'weight' => '現在の体重',
            'target_weight' => '目標の体重',
            'date' => '日付',
            'calories' => '摂取カロリー',
            'exercise_time' => '運動時間',
            'exercise_content' => '',
        ];
    }
}
