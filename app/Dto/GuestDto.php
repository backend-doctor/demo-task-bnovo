<?php

namespace App\Dto;

use Illuminate\Http\Request;

class GuestDto
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $phone,
        public ?string $country = null,
    ) {}
    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->first_name,
            $request->last_name,
            $request->email,
            $request->phone,
            $request->country
        );
    }
}
