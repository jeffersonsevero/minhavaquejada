<?php

namespace App\Filament\Resources\CowboyPassResource\Pages;

use App\Filament\Resources\CowboyPassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCowboyPasses extends ListRecords
{
    protected static string $resource = CowboyPassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
