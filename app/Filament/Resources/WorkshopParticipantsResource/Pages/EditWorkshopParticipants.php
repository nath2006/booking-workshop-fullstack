<?php

namespace App\Filament\Resources\WorkshopParticipantsResource\Pages;

use App\Filament\Resources\WorkshopParticipantsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkshopParticipants extends EditRecord
{
    protected static string $resource = WorkshopParticipantsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
