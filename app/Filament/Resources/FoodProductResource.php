<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodProductResource\Pages;
use App\Models\FoodProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FoodProductResource extends Resource
{
    protected static ?string $model = FoodProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-cake';

    protected static ?string $navigationGroup = 'Product Catalog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100)
                    ->label('Product Name'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->label('Description'),
                Forms\Components\TextInput::make('manufacturer')
                    ->required()
                    ->maxLength(100)
                    ->label('Manufacturer'),
                Forms\Components\TextInput::make('country')
                    ->required()
                    ->maxLength(50)
                    ->label('Country of Origin'),
                Forms\Components\TextInput::make('packaging')
                    ->required()
                    ->maxLength(100)
                    ->label('Packaging'),
                Forms\Components\TextInput::make('packing_size')
                    ->required()
                    ->maxLength(50)
                    ->label('Package Size'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Product Name'),
                Tables\Columns\TextColumn::make('manufacturer')
                    ->searchable()
                    ->sortable()
                    ->label('Manufacturer'),
                Tables\Columns\TextColumn::make('country')
                    ->searchable()
                    ->label('Country of Origin'),
                Tables\Columns\TextColumn::make('packaging')
                    ->label('Packaging'),
                Tables\Columns\TextColumn::make('packing_size')
                    ->label('Package Size'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListFoodProducts::route('/'),
            'create' => Pages\CreateFoodProduct::route('/create'),
            'edit' => Pages\EditFoodProduct::route('/{record}/edit'),
        ];
    }
}
