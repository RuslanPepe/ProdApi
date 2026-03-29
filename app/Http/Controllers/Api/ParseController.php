<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\dateRequest;
use App\Models\Income;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Stock;
use App\Services\ParseServices;
use Illuminate\Http\Request;

class ParseController extends Controller {
    public function parseSales(Request $request, ParseServices $services) {
        return $services->parse(Sale::class, 'sales', $request->all());
    }
    public function parseOrders(Request $request, ParseServices $services) {
        return $services->parse(Order::class, 'orders', $request->all());
    }
    public function parseStocks(Request $request, ParseServices $services) {
        return $services->parse(Stock::class, 'stocks', $request->all());
    }
    public function parseIncomes(Request $request, ParseServices $services) {
        return $services->parse(Income::class, 'incomes', ['from' => date('Y-m-d')]);
    }
}
