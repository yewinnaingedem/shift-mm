<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Providers\EngineServiceProvider;
use Illuminate\Validation\Rule;

class EngineValidationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'Engine_power' => [
                'required',
                Rule::unqiue('engines')->where(function ($query) {
                    return $query->where('Engine_power',request('Engine_power'))->where('Fuel',request('Fuel'));
                }),
            ],
        ];
    }
}
