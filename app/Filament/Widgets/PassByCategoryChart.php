<?php

namespace App\Filament\Widgets;

use App\Models\CowboyPass;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class PassByCategoryChart extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'passByCategoryChart';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'Quantidade de senhas vendidas por categoria';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     */
    protected function getOptions(): array
    {

        $quantityCowboysByCategory = CowboyPass::query()
            ->with('pass.category')
            ->get()
            ->groupBy('pass.category_id')
            ->map(function ($item) {

                return [
                    'category' => $item->first()->pass->category->name,
                    'quantity' => $item->count(),
                ];
            });

        return [
            'chart' => [
                'type' => 'pie',
                'height' => 300,
            ],
            'series' => $quantityCowboysByCategory->pluck('quantity')->toArray(),
            'labels' => $quantityCowboysByCategory->pluck('category')->toArray(),
            'legend' => [
                'labels' => [
                    'fontFamily' => 'inherit',
                ],
            ],
        ];
    }
}
