<?php

namespace App\Filament\Resources\FoodProductResource\Pages;

use App\Filament\Resources\FoodProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFoodProducts extends ListRecords
{
    protected static string $resource = FoodProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}