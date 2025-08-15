<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('order_no')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('subtotal')
                    ->required()
                    ->numeric()
                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => 
                        $mask->money(prefix: 'TTD ', decimalPlaces: 2)
                    ),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric()
                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => 
                        $mask->money(prefix: 'TTD ', decimalPlaces: 2)
                    ),
                Forms\Components\TextInput::make('payment_provider')
                    ->required()
                    ->maxLength(255)
                    ->default('none'),
                Forms\Components\TextInput::make('payment_id')
                    ->required()
                    ->maxLength(255)
                    ->default('none'),
                Forms\Components\TextInput::make('shipping_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('shipping_address_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('billing_address_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('payment_status')
                    ->required()
                    ->maxLength(20)
                    ->default('unpaid'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtotal')
                    ->money('TTD', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->money('TTD', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_provider')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shipping_address_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('billing_address_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
