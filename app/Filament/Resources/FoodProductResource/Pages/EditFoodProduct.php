<?php

namespace App\Filament\Resources\FoodProductResource\Pages;

use App\Filament\Resources\FoodProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoodProduct extends EditRecord
{
    protected static string $resource = FoodProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}