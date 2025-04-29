<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'barber_id' => 'required|integer|exists:barbers,id',
            'date' => 'required|date_format:Y-m-d H:i:s',
        ];
    }

    public function messages(): array
    {
        return [
            'barber_id.exists' => 'O barbeiro selecionado não é válido'
        ];
    }
}
