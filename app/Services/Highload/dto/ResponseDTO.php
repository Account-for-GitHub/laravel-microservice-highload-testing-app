<?php

namespace App\Services\Highload\dto;

class ResponseDTO
{
    public function __construct(
        public int    $status,
        public string $response,
    )
    {
    }
}
