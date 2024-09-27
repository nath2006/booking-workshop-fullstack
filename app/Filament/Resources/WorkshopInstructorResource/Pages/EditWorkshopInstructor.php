<?php

namespace App\Filament\Resources\WorkshopInstructorResource\Pages;

use App\Filament\Resources\WorkshopInstructorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkshopInstructor extends EditRecord
{
    protected static string $resource = WorkshopInstructorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
