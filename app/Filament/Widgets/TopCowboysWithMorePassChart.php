<?php

namespace App\Filament\Widgets;

use App\Models\CowboyPass;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class TopCowboysWithMorePassChart extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'topCowboysWithMorePassChart';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'Top 10 Vaqueiros com mais senhas compradas';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     */
    protected function getOptions(): array
    {

        $cowboysWithMorePass = CowboyPass::query()
            ->with('titular')
            ->get()
            ->groupBy('cowboy_id')
            ->map(function ($item) {

                return [
                    'titular' => $item->first()->titular->name,
                    'quantity' => $item->count(),
                ];
            })
            ->sortByDesc('quantity')
            ->take(10);

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Quantidade',
                    'data' => $cowboysWithMorePass->pluck('quantity')->toArray(),
                ],
            ],
            'xaxis' => [
                'categories' => $cowboysWithMorePass->pluck('titular')->toArray(),
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 3,
                    'horizontal' => true,
                ],
            ],
        ];
    }
}
