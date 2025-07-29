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
    
    protected static ?string $navigationGroup = 'Katalog Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100)
                    ->label('Nama Produk'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->label('Deskripsi'),
                Forms\Components\TextInput::make('manufacturer')
                    ->required()
                    ->maxLength(100)
                    ->label('Produsen'),
                Forms\Components\TextInput::make('country')
                    ->required()
                    ->maxLength(50)
                    ->label('Negara Asal'),
                Forms\Components\TextInput::make('packaging')
                    ->required()
                    ->maxLength(100)
                    ->label('Kemasan'),
                Forms\Components\TextInput::make('packing_size')
                    ->required()
                    ->maxLength(50)
                    ->label('Ukuran Kemasan'),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('Rp')
                    ->label('Harga'),
                Forms\Components\FileUpload::make('image_url')
                    ->image()
                    ->directory('food-products')
                    ->label('Gambar Produk'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Produk'),
                Tables\Columns\TextColumn::make('manufacturer')
                    ->searchable()
                    ->sortable()
                    ->label('Produsen'),
                Tables\Columns\TextColumn::make('country')
                    ->searchable()
                    ->label('Negara Asal'),
                Tables\Columns\TextColumn::make('packaging')
                    ->label('Kemasan'),
                Tables\Columns\TextColumn::make('packing_size')
                    ->label('Ukuran Kemasan'),
                Tables\Columns\TextColumn::make('price')
                    ->money('idr')
                    ->sortable()
                    ->label('Harga'),
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Gambar'),
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