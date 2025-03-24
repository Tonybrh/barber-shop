<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'barber_id' => 'required|integer',
            'date' => 'required|date',
        ];
    }
}
