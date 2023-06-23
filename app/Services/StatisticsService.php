<?php

namespace App\Services;
use App\Repositories\ItemRepository;
use BadMethodCallException;


class StatisticsService
{
    private $labels = [
        'count' => 'total items count',
        'avg' => 'average price of an item',
        'website' => 'website with the highest total price of its items',
        'price' => 'total price of items added this month',

    ];

    public function getStatistics ($infos, $format = 'json'): array {
        $result = [];

        $statisticsRepository = new ItemRepository();
        foreach ($infos as $info) {
            $stat = $statisticsRepository->$info();
            if ($format == 'table'){
                $result[] = [$this->labels[$info], $stat];
            }else{
                $result[$this->labels[$info]] = $stat;
            }
        }
        return $result;
    }
}
