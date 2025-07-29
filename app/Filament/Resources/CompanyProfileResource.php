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
    
    protected static ?string $navigationLabel = 'Profil Perusahaan';
    
    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Perusahaan')
                    ->schema([
                        Forms\Components\TextInput::make('company_name')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Perusahaan'),
                        Forms\Components\Textarea::make('company_description')
                            ->required()
                            ->maxLength(65535)
                            ->label('Deskripsi Perusahaan')
                            ->rows(3),
                        Forms\Components\Textarea::make('vision')
                            ->maxLength(65535)
                            ->label('Visi')
                            ->rows(2),
                        Forms\Components\Textarea::make('mission')
                            ->maxLength(65535)
                            ->label('Misi')
                            ->rows(3),
                    ])->columns(2),
                    
                Forms\Components\Section::make('Kontak')
                    ->schema([
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->maxLength(255)
                            ->label('Alamat')
                            ->rows(2),
                        Forms\Components\TextInput::make('phone')
                            ->required()
                            ->maxLength(255)
                            ->label('Telepon'),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email()
                            ->maxLength(255)
                            ->label('Email'),
                        Forms\Components\TextInput::make('website')
                            ->maxLength(255)
                            ->label('Website'),
                    ])->columns(2),
                    
                Forms\Components\Section::make('Hero Section')
                    ->schema([
                        Forms\Components\TextInput::make('hero_title')
                            ->required()
                            ->maxLength(255)
                            ->label('Judul Hero'),
                        Forms\Components\Textarea::make('hero_subtitle')
                            ->required()
                            ->maxLength(65535)
                            ->label('Subjudul Hero')
                            ->rows(2),
                        Forms\Components\FileUpload::make('logo_url')
                            ->image()
                            ->directory('company')
                            ->label('Logo Perusahaan'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Perusahaan'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->label('Telepon'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Terakhir Diupdate'),
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
