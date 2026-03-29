<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class ParseServices
{
    public function parse($model, $type, $request) {
        $page = 1;
        $total = 0;
        $start = microtime(true);

        logger($request);

        do {
            $response = Http::get('http://109.73.206.144:6969/api/' . $type, [
                'dateFrom' => $request['from'],
                'dateTo' => $request['to'] ?? '',
                'page' => $page,
                'limit' => 100,
                'key' => 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie',
            ]);
            $page++;

            foreach ($response->json('data') as $sale) {
                $duplicateField = array_filter([
                    'g_number' => $sale['g_number'] ?? null,
                    'date' => $sale['date'] ?? null,
                    'income_id' => $sale['income_id'] ?? null,
                    'nm_id' => $sale['nm_id'] ?? null,
                ], fn($item) => !is_null($item) && $item !== '');

                $model::updateOrCreate($duplicateField, $sale);
            }

            $total += count($response->json('data'));
        } while ($response['links']['next'] !== null);

        logger($total.' '.(microtime(true)) - $start);
        return response()->json('total: ' . $total);
    }
}
