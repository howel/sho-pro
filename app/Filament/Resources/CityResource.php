<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CityResource\Pages;
use App\Models\City;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CityResource extends Resource
{
    protected static ?string $model = City::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin'; // Icono de mapa
    protected static ?string $navigationLabel = 'Ciudades y Envíos';
    protected static ?string $pluralModelLabel = 'Ciudades';
    protected static ?string $modelLabel = 'Ciudad';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nombre de la Ciudad / Distrito')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->placeholder('Ej. Moyobamba'),

                    Forms\Components\TextInput::make('shipping_cost')
                        ->label('Costo de Envío')
                        ->numeric()
                        ->required()
                        ->prefix('S/')
                        ->default(0),

                    Forms\Components\Toggle::make('is_active')
                        ->label('¿Está activa para envíos?')
                        ->default(true)
                        ->inline(false),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Ciudad')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('shipping_cost')
                    ->label('Costo de Envío')
                    ->money('PEN') // Formato moneda Soles
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                // Filtro rápido para ver solo activas/inactivas
                Tables\Filters\SelectFilter::make('is_active')
                    ->options([
                        '1' => 'Activas',
                        '0' => 'Inactivas',
                    ])
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCities::route('/'),
            'create' => Pages\CreateCity::route('/create'),
            'edit' => Pages\EditCity::route('/{record}/edit'),
        ];
    }
}