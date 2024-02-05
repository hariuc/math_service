<?php

namespace App\Http\Controllers;


use App\Modules\Equations\QuadraticEquations\Requests\QuadraticEquationRequest;
use App\Modules\Equations\QuadraticEquations\Services\QuadraticEquationService;
use Illuminate\Http\JsonResponse;

class QuadraticEquationController extends Controller
{
    public function __construct(private readonly QuadraticEquationService $service)
    {
    }

    public function __invoke(QuadraticEquationRequest $request): JsonResponse
    {
        $values = $request->json();
        return response()->json(
            ["data" => $this->service->solution($values)],
        );
    }
}
