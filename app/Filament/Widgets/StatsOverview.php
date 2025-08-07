<?php

namespace App\Filament\Widgets;

use App\Models\CowboyPass;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $quantityMoney = CowboyPass::query()
            ->with('pass.category')
            ->get()
            ->sum('pass.category.price');

        return [

            Stat::make('Quantidade de Senhas vendidas', CowboyPass::count())
                ->description('Até hoje')
                ->color('primary')
                ->icon('heroicon-s-ticket'),
            Stat::make('Valor arrecadado', 'R$ '.$quantityMoney)
                ->description('Até hoje')
                ->color('success')
                ->chart([1, 2, 3, 1, 4, 5, 6, 2, 7, 8, 9, 10])
                ->icon('heroicon-o-currency-dollar'),
        ];
    }
}
