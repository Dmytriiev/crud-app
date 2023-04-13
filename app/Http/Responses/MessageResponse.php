<?php

namespace App\Http\Responses;

use App\Http\Traits\SendsResponse;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class MessageResponse implements Responsable
{
    use SendsResponse;

    protected array $preparedData = [];

    public function __construct(
        public readonly string $message,
        public readonly bool $success = true,
        public readonly null|int $status = Response::HTTP_OK,
    ) {
        $this->preparedData = [
            'success' => $this->success,
            'message' => $this->message,
        ];
    }
}
