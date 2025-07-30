<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApiResource\Pages;
use App\Models\ActivePharmaceuticalIngredient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ApiResource extends Resource
{
    protected static ?string $model = ActivePharmaceuticalIngredient::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    
    protected static ?string $navigationLabel = 'Active Pharmaceutical Ingredients';
    
    protected static ?string $navigationGroup = 'Katalog Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100)
                    ->label('Nama API'),
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
                Forms\Components\FileUpload::make('image_url')
                    ->image()
                    ->directory('api-products')
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
                    ->label('Nama API'),
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
            'index' => Pages\ListApis::route('/'),
            'create' => Pages\CreateApi::route('/create'),
            'edit' => Pages\EditApi::route('/{record}/edit'),
        ];
    }
}