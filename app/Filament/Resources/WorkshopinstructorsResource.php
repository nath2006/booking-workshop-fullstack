<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkshopinstructorsResource\Pages;
use App\Filament\Resources\WorkshopinstructorsResource\RelationManagers;
use App\Models\Workshopinstructors;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkshopInstructorsResource extends Resource
{
    protected static ?string $model = Workshopinstructors::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Workshop Instructor';
    protected static ?string $pluralLabel = 'Workshop Instructors';

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

                Forms\Components\FileUpload::make('avatar')
                ->image()
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('occupation'),
                Tables\Columns\ImageColumn::make('avatar'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListWorkshopinstructors::route('/'),
            'create' => Pages\CreateWorkshopinstructors::route('/create'),
            'edit' => Pages\EditWorkshopinstructors::route('/{record}/edit'),
        ];
    }
}
