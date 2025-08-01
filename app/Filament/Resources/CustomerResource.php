<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100)
                    ->label('Customer Name'),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->label('Description'),
                Forms\Components\TextInput::make('website')
                    ->url()
                    ->maxLength(255)
                    ->label('Website'),
                Forms\Components\TextInput::make('industry')
                    ->maxLength(100)
                    ->label('Industry'),
                Forms\Components\FileUpload::make('logo_url')
                    ->image()
                    ->directory('customers')
                    ->imageEditor()
                    ->imageCropAspectRatio('2:1')
                    ->imageResizeTargetWidth('400')
                    ->imageResizeTargetHeight('200')
                    ->maxSize(1024)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->label('Customer Logo')
                    ->helperText('Recommended size: 400x200px. Max size: 1MB'),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Featured Customer')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Customer Name'),
                Tables\Columns\TextColumn::make('industry')
                    ->searchable()
                    ->label('Industry'),
                Tables\Columns\TextColumn::make('website')
                    ->searchable()
                    ->label('Website'),
                Tables\Columns\ImageColumn::make('logo_url')
                    ->label('Logo'),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
