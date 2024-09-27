<?php

namespace App\Filament\Resources\WorkshopParticipantsResource\Pages;

use App\Filament\Resources\WorkshopParticipantsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkshopParticipants extends ListRecords
{
    protected static string $resource = WorkshopParticipantsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
