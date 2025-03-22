<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'email' => ['string', 'email', 'required'],
            'phone' => ['string', 'required'],
            'roles' => ['nullable'],
            'password' => [Password::min(5)->letters()->numbers()],
            'user_type_id' => ['integer', 'required'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new \DomainException(
            $errors->first(),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
