<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductResource;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Delete')
            ->requiresConfirmation(false)
            ->action(function () {
                Notification::make()
                    ->title('Hey you, why touching yuh father head?')
                    ->warning()
                    ->send();
                }),
            // Actions\DeleteAction::make(),
        ];
    }
}
