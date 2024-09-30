<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkshopParticipantsResource\Pages;
use App\Filament\Resources\WorkshopParticipantsResource\RelationManagers;
use App\Models\WorkshopParticipants;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkshopParticipantsResource extends Resource
{
    protected static ?string $model = WorkshopParticipants::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('occupation')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('email')
                ->required()
                ->maxLength(255),

                Forms\Components\Select::make('workshop_id')
                ->relationship('workshop','name')
                ->searchable()
                ->preload()
                ->required(),

                Forms\Components\Select::make('booking_transaction_id')
                ->relationship('bookingTransaction','booking_trx_id')
                ->searchable()
                ->preload()
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\ImageColumn::make('workshop.thumbnail'),

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TagsColumn::make('email')
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkshopParticipants::route('/'),
            'create' => Pages\CreateWorkshopParticipants::route('/create'),
            'edit' => Pages\EditWorkshopParticipants::route('/{record}/edit'),
        ];
    }
}
