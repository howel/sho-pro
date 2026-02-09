<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicioTallerResource\Pages;
use App\Filament\Resources\ServicioTallerResource\RelationManagers;
use App\Models\ServicioTaller;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class ServicioTallerResource extends Resource
{
    protected static ?string $model = ServicioTaller::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('cliente')->required(),
                TextInput::make('moto_modelo')->required(),
                Textarea::make('descripcion_servicio')->required(),
                DatePicker::make('fecha_ingreso')->required(),
                DatePicker::make('fecha_entrega'),
                Select::make('estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'en_proceso' => 'En proceso',
                        'finalizado' => 'Finalizado',
                    ])
                    ->default('pendiente')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('cliente')->searchable(),
                TextColumn::make('moto_modelo')->searchable(),
                TextColumn::make('estado')->badge()
                    ->colors([
                        'warning' => 'pendiente',
                        'info' => 'en_proceso',
                        'success' => 'finalizado',
                    ]),
                TextColumn::make('fecha_ingreso')->date(),
                TextColumn::make('fecha_entrega')->date(),
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
            'index' => Pages\ListServicioTallers::route('/'),
            'create' => Pages\CreateServicioTaller::route('/create'),
            'edit' => Pages\EditServicioTaller::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->can('registrar_servicio_taller');
    }

    public static function canCreate(): bool
    {
        return auth()->user()->can('registrar_servicio_taller');
    }

    public static function canEdit($record): bool
    {
        return auth()->user()->can('registrar_servicio_taller');
    }

    public static function canDelete($record): bool
    {
        return auth()->user()->can('registrar_servicio_taller');
    }
}
