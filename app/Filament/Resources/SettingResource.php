<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Configuración';
    protected static ?string $modelLabel = 'Ajuste';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Ajustes del Sitio')
                    ->description('Administra logos y datos de contacto.')
                    ->schema([
                        TextInput::make('key')
                            ->label('Identificador (Key)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->disabled(fn ($record) => $record !== null)
                            ->live(),

                        // Campo para Imágenes (Logos)
                        FileUpload::make('value_file')
                            ->label('Imagen / Logo')
                            ->image()
                            ->directory('settings')
                            ->visible(fn ($get) => str_contains((string)$get('key'), 'logo'))
                            ->required(fn ($get) => str_contains((string)$get('key'), 'logo')),

                        // Campo para Textos (Teléfono, Dirección, Email)
                        TextInput::make('value_text')
                            ->label('Contenido de Texto')
                            ->placeholder('Ej: +51 969... o Calle Amazonas 123')
                            ->visible(fn ($get) => !str_contains((string)$get('key'), 'logo'))
                            ->required(fn ($get) => !str_contains((string)$get('key'), 'logo')),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('Clave')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('value_text')
                    ->label('Texto')
                    ->limit(40)
                    ->placeholder('N/A'),

                Tables\Columns\ImageColumn::make('value_file')
                    ->label('Vista Previa')
                    ->disk('public'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Modificado')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}