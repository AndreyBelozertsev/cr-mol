<?php

namespace App\Http\Requests;

use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string','max:100'],
            'last_name' => ['required', 'string','max:100'],
            'patronymic' => ['sometimes','string','nullable', 'max:100'],
            'phone' => ['required','digits:11'],
            'birthday' => ['required','date', 'date_format:Y-m-d', 'before:' . date('Y-m-d')],
            'city_id' => ['required','numeric', 'max:' . City::max('id')],
            'agree' => ['required','accepted'],
        ];
    }

        /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        
        $this->merge([
            'phone' => Str::phoneNumber($this->phone),
        ]);
    }
}