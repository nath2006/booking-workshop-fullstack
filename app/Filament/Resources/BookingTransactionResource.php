<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingTransactionResource\Pages;
use App\Filament\Resources\BookingTransactionResource\RelationManagers;

use App\Models\BookingTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Workshop;

class BookingTransactionResource extends Resource
{
    protected static ?string $model = BookingTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Wizard::make([
                Forms\Components\Wizard\Step::make('Product and Price')
                    ->schema([
                        Forms\Components\Select::make('workshop_id')
                        ->relationship('workshop', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->live()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $workshop = Workshop::find($state);  // Make sure this references Workshop::class, not Workshop::lass
                            $set('price', $workshop ? $workshop->price : 0);
                        })
                        ->afterStateHydrated(function ($state, $get, callable $set) {
                            $workshop = Workshop::find($state);  // Same here, check Workshop::class
                            $set('price', $workshop ? $workshop->price : 0);
                        }),

                        Forms\Components\TextInput::make('quantity')
                            ->required()
                            ->numeric()
                            ->prefix('Qty People')
                            ->live()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                $price = $get('price');
                                $subTotal = $price * $state;
                                $totalPpn = $subTotal * 0.11; // PPN tax calculation
                                $totalAmount = $subTotal + $totalPpn;
                                $set('total_amount', $totalAmount);

                                $participants = $get('participants') ?? [];
                                $currentCount = count($participants);

                                if($state > $currentCount){
                                    for ($i = $currentCount; $i < $state; $i++){
                                        $participants [] = ['name' => '','occupation' =>'', 'email'=>''];
                                    }
                                } else {
                                    $participants = array_slice($participants, 0, $state);
                                }
                                $set('participants', $participants);
                            })
                            ->afterStateHydrated(function($state, callable $get, callable $set){
                                $price = $get('price');
                                $subTotal = $price * $state;
                                $totalPpn = $subTotal * 0.11;
                                $totalAmount = $subTotal + $totalPpn;
                                $set('total_amount', $totalAmount);
                            })
                    ]),

                Forms\Components\Wizard\Step::make('Total Amount')
                ->schema([
                    Forms\Components\TextInput::make('total_amount')
                        ->required()
                        ->numeric()
                        ->prefix('IDR')
                        ->readOnly()
                        ->helperText('Harga Sudah Termasuk Pajak PPN 11%'),
                ]),

                Forms\Components\Wizard\Step::make('Participants')
                    ->schema([
                        Repeater::make('participants')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Participants Name')
                                            ->required(),
                                        Forms\Components\TextInput::make('occupation')
                                            ->label('Occupation')
                                            ->required(),
                                        Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->required(),
                                    ]),
                            ])
                            ->columns(1)
                            ->label('Participant Details'),
                    ]),

                    Forms\Components\Wizard\Step::make('Customer Information')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),

                                Forms\Components\TextInput::make('email')
                                ->required()
                                ->maxLength(255),

                                Forms\Components\TextInput::make('phone')
                                ->required()
                                ->maxLength(255),

                                Forms\Components\TextInput::make('customer_bank_name')
                                ->required()
                                ->maxLength(255),

                                Forms\Components\TextInput::make('customer_bank_account')
                                ->required()
                                ->maxLength(255),

                                Forms\Components\TextInput::make('customer_bank_number')
                                ->required()
                                ->maxLength(255),

                                Forms\Components\TextInput::make('booking_trx_id')
                                ->required()
                                ->maxLength(255),
                        ]),

                        Forms\Components\Wizard\Step::make('Payment Information')
                        ->schema([
                            ToggleButtons::make('is_paid')
                            ->label('Payment Confirmed')
                            ->boolean()
                            ->grouped()
                            ->icons([
                                true => 'heroicon-o-pencil',
                                false => 'heroicon-o-clock',
                            ])
                            ->required(),

                            Forms\Components\FileUpload::make('proof')
                                ->image()
                                ->required(),
                            ]),
                    ])
                    ->columnSpan('full')//Use full width for the wizard
                    ->columns(1) //Make sure the for has a single column layout
                    ->skippable()
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\ImageColumn::make('workshop.thumbnail'),

                Tables\Columns\TextColumn::MAKE('name')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_paid')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->label('Verifited'),
            ])
            ->filters([
                //
                SelectFilter::make('workshop_id')
                ->label('workshop')
                    ->relationship('workshop','name'),
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
            // Define your relations here
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookingTransactions::route('/'),
            'create' => Pages\CreateBookingTransaction::route('/create'),
            'edit' => Pages\EditBookingTransaction::route('/{record}/edit'),
        ];
    }
}
