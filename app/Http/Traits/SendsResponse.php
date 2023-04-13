<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait SendsResponse
{
    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: $this->preparedData,
            status: $this->status,
        );
    }
}
