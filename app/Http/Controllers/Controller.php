<?php

namespace App\Http\Controllers;

use App\enums\HttpResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function successResponse($data = [], $code = HttpResponse::OK, $message = ''): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    }


    protected function failResponse(string $message, $code = HttpResponse::BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'status' => 'failure',
            'code' => $code,
            'message' => $message,
//            'data' => $data
        ], $code);
    }
}
