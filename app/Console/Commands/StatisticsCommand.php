<?php

namespace App\Console\Commands;

use App\Services\StatisticsService;
use Illuminate\Console\Command;

class StatisticsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistics:display {information?*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'statistics for the wishlist items. the command accepts 4 arguments
                                total: to get total items count
                                avg: to get average price of an item
                                website: to get the website with the highest total price of its items
                                price: to get total price of items added this month
                            ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(StatisticsService $statisticsService)
    {
        try {
            $this->table(
                ['information', 'value'],
                $statisticsService->getStatistics($this->argument('information'), 'table')
            );
        } catch (\BadMethodCallException $e) {
            $this->error('Invalid Argument: for more details php artisan statistics:display --help');
        }

    }
}
