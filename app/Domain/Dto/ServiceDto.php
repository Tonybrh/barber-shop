<?php

namespace App\Domain\Dto;

use Illuminate\Foundation\Http\FormRequest;

class ServiceDto
{
    public function __construct(
        public string $name,
        public string $description,
        public float $price,
        public int $duration,
    ) {
    }

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            name: $request->input('name'),
            description: $request->input('description'),
            price: $request->input('price'),
            duration: $request->input('duration'),
        );
    }
}
