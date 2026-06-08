<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessTestJob;
use Illuminate\Http\JsonResponse;

class TestJobController extends Controller
{
    public function __invoke(): JsonResponse
    {
        ProcessTestJob::dispatch();

        return response()->json([
            'message' => 'Job dispatched successfully.',
            'job' => ProcessTestJob::class,
            'dispatched_at' => now()->toISOString(),
        ]);
    }
}
