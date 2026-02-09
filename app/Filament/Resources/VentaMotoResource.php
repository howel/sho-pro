<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VentaMotoResource\Pages;
use App\Models\VentaMoto;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;

class VentaMotoResource extends Resource
{
    protected static ?string $model = VentaMoto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('cliente')->required(),
                TextInput::make('moto_modelo')->required(),
                TextInput::make('precio')->numeric()->required(),
                DatePicker::make('fecha_venta')->required(),
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
                TextColumn::make('moto_modelo')->searchable(),
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
                \Filament\Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListVentaMotos::route('/'),
            'create' => Pages\CreateVentaMoto::route('/create'),
            'edit' => Pages\EditVentaMoto::route('/{record}/edit'),
        ];
    }

    // 🔒 Restricciones por permisos
    public static function canViewAny(): bool
    {
        return auth()->user()->can('crear_venta_motos');
    }

    public static function canCreate(): bool
    {
        return auth()->user()->can('crear_venta_motos');
    }

    public static function canEdit($record): bool
    {
        return auth()->user()->can('crear_venta_motos');
    }

    public static function canDelete($record): bool
    {
        return auth()->user()->can('crear_venta_motos');
    }
}