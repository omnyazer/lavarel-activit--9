<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'url' => ['nullable', 'url:http,https'],
            'details' => ['nullable', 'string'],
            'price' => ['required', 'decimal:0,2'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du cadeau est obligatoire',
            'name.min' => 'Le nom du cadeau doit contenir au moins :min caractères',
            'name.max' => 'Le nom du cadeau ne peut pas dépasser :max caractères',

            'price.required' => 'Le prix est obligatoire',
            'price.decimal' => 'Le prix doit être un nombre avec au maximum deux décimales',

            'url.url' => 'Le lien doit être une URL valide commençant par http ou https',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'nom du cadeau',
            'price' => 'prix',
            'url' => 'lien',
            'details' => 'détails',
        ];
    }
}
