<?php

namespace App\Filament\Resources\RepresentationResource\Pages;

use App\Filament\Resources\RepresentationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRepresentations extends ManageRecords
{
    protected static string $resource = RepresentationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
