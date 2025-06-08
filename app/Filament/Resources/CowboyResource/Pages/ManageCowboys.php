<?php

namespace App\Filament\Resources\CowboyResource\Pages;

use App\Filament\Resources\CowboyResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCowboys extends ManageRecords
{
    protected static string $resource = CowboyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
