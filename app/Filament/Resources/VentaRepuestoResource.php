<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VentaRepuestoResource\Pages;
use App\Models\VentaRepuesto;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

// ✅ Imports de Form Components
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;

// ✅ Imports de Table Columns y Actions
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class VentaRepuestoResource extends Resource
{
    protected static ?string $model = VentaRepuesto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('cliente')
                    ->label('Cliente')
                    ->required(),

                Select::make('repuesto_id')
                    ->label('Repuesto')
                    ->relationship('repuesto', 'name') // relación con Product
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('cantidad')
                    ->numeric()
                    ->default(1)
                    ->required(),

                TextInput::make('precio')
                    ->numeric()
                    ->prefix('S/')
                    ->required(),

                DatePicker::make('fecha_venta')
                    ->label('Fecha de Venta')
                    ->required(),

                Select::make('estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'pagado' => 'Pagado',
                        'cancelado' => 'Cancelado',
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
                TextColumn::make('repuesto.name')->label('Repuesto')->searchable(),
                TextColumn::make('cantidad')->sortable(),
                TextColumn::make('precio')->money('USD'),
                TextColumn::make('fecha_venta')->date(),
                BadgeColumn::make('estado')
                    ->colors([
                        'warning' => 'pendiente',
                        'success' => 'pagado',
                        'danger' => 'cancelado',
                    ]),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVentaRepuestos::route('/'),
            'create' => Pages\CreateVentaRepuesto::route('/create'),
            'edit' => Pages\EditVentaRepuesto::route('/{record}/edit'),
        ];
    }

    // 🔒 Restricciones por permisos
    public static function canViewAny(): bool { return auth()->user()->can('crear_venta_repuestos'); }
    public static function canCreate(): bool { return auth()->user()->can('crear_venta_repuestos'); }
    public static function canEdit($record): bool { return auth()->user()->can('crear_venta_repuestos'); }
    public static function canDelete($record): bool { return auth()->user()->can('crear_venta_repuestos'); }
}