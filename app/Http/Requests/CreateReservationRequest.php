<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'barber_id' => 'required|integer|exists:users,id,role,barber',
            'date' => 'required|date_format:d-m-Y H:i:s',
            'services' => 'required|array|exists:services,id',
        ];
    }

    public function messages(): array
    {
        return [
            'barber_id.exists' => 'O barbeiro selecionado não é válido'
        ];
    }
}
