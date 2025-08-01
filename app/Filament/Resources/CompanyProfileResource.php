<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyProfileResource\Pages;
use App\Filament\Resources\CompanyProfileResource\RelationManagers;
use App\Models\CompanyProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyProfileResource extends Resource
{
    protected static ?string $model = CompanyProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('company_name')
                    ->required()
                    ->maxLength(100)
                    ->label('Company Name'),
                Forms\Components\Textarea::make('company_description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->label('Company Description'),
                Forms\Components\Textarea::make('vision')
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->label('Vision'),
                Forms\Components\Textarea::make('mission')
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->label('Mission'),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255)
                    ->label('Address'),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->maxLength(20)
                    ->label('Phone'),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(100)
                    ->label('Email'),
                Forms\Components\TextInput::make('fax')
                    ->maxLength(20)
                    ->label('Fax'),
                Forms\Components\TextInput::make('whatsapp')
                    ->maxLength(20)
                    ->label('WhatsApp'),
                Forms\Components\TextInput::make('hero_title')
                    ->required()
                    ->maxLength(100)
                    ->label('Hero Title'),
                Forms\Components\TextInput::make('hero_subtitle')
                    ->required()
                    ->maxLength(255)
                    ->label('Hero Subtitle'),
                Forms\Components\FileUpload::make('hero_image')
                    ->image()
                    ->directory('hero')
                    ->imageEditor()
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->label('Hero Background Image')
                    ->helperText('Recommended size: 1920x1080px. Max size: 5MB'),
                Forms\Components\FileUpload::make('logo_url')
                    ->image()
                    ->directory('company')
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('400')
                    ->imageResizeTargetHeight('400')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->label('Company Logo')
                    ->helperText('Recommended size: 400x400px. Max size: 2MB'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable()
                    ->sortable()
                    ->label('Company Name'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->label('Phone'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp'),
                Tables\Columns\TextColumn::make('fax')
                    ->label('Fax'),
                Tables\Columns\ImageColumn::make('logo_url')
                    ->label('Logo'),
                Tables\Columns\ImageColumn::make('hero_image')
                    ->label('Hero Image'),
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
            'index' => Pages\ListCompanyProfiles::route('/'),
            'create' => Pages\CreateCompanyProfile::route('/create'),
            'edit' => Pages\EditCompanyProfile::route('/{record}/edit'),
        ];
    }
}
