<?php

namespace App\Filament\Resources\WorkshopInstructorResource\Pages;

use App\Filament\Resources\WorkshopInstructorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkshopInstructors extends ListRecords
{
    protected static string $resource = WorkshopInstructorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
