<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\ParseController;
use App\Models\Income;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Stock;
use App\Services\ParseServices;
use http\Client\Request;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('parse:api-data {--from=} {--to=}')]
#[Description('Парсинг данных')]
class ApiData extends Command {
    /**
     * Execute the console command.
     */
    public function handle(ParseServices $services) {
        $from = $this->option('from');
        $to = $this->option('to');

        $request = ['from' => $from, 'to' => $to];

        $services->parse(Sale::class, 'sales', $request);

        $services->parse(Order::class, 'orders', $request);

        $services->parse(Income::class, 'incomes', $request);

        $services->parse(Stock::class, 'stocks', ['from' => date('Y-m-d')]);

        $this->info('successful!');

        return Command::SUCCESS;
    }
}
