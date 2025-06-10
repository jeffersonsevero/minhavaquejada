<?php

namespace App\Filament\Resources\CowboyPassResource\Pages;

use App\Filament\Resources\CowboyPassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCowboyPass extends EditRecord
{
    protected static string $resource = CowboyPassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
