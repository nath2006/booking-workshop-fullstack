<?php

namespace App\Filament\Resources\BookingTransactionResource\Pages;

use App\Models\WorkshopParticipants;
use App\Filament\Resources\BookingTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\DB;

class EditBookingTransaction extends EditRecord
{
    protected static string $resource = BookingTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array {
        // Fetch existing participants and add them to the form data
        $data['participants'] = $this->record->participants->map(function ($participant) {
            return [
                'name' => $participant->name,
                'occupation' => $participant->occupation,
                'email' => $participant->email,
            ];
        })->toArray();

        return $data;
    }

    protected function afterSave(): void {
        DB::transaction(function() {
            $record = $this->record;
            $record->participants()->delete(); // Clear existing data to avoid duplicates

            $participants = $this->form->getState()['participants'];

            // Iterate over each participant and create a record in the workshop_participants table
            foreach($participants as $participant) {
                WorkshopParticipants::create([
                    'workshop_id' => $record->workshop_id,
                    'booking_transaction_id' => $record->id,
                    'name' => $participant['name'],
                    'occupation' => $participant['occupation'],
                    'email' => $participant['email'],
                ]);
            }
        });
    }
}
