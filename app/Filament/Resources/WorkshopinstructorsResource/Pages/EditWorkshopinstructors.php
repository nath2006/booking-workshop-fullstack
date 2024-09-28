<?php

namespace App\Filament\Resources\WorkshopinstructorsResource\Pages;

use App\Filament\Resources\WorkshopinstructorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkshopinstructors extends EditRecord
{
    protected static string $resource = WorkshopinstructorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
