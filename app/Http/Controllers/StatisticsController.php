<?php

namespace App\Http\Controllers;

use App\Services\StatisticsService;
use Illuminate\Http\JsonResponse;

class StatisticsController extends Controller
{
    public function statistics(StatisticsService $statisticsService): JsonResponse
    {
        $infos = ['website', 'count', 'avg', 'price'];
        return response()->json( ['statistics' => $statisticsService->getStatistics($infos)]);
    }
}
