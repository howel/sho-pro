<?php

namespace App\Filament\Resources;

// ... imports necesarios al inicio
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;

//use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
    ->schema([
        Forms\Components\Card::make()->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
            
            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(Category::class, 'slug', ignoreRecord: true),

            Forms\Components\Select::make('parent_id')
                ->label('Categoría Padre')
                ->relationship('parent', 'name')
                ->searchable()
                ->placeholder('Ninguna (es categoría principal)'),

            Forms\Components\Toggle::make('is_visible')
                ->label('Visible en el menú')
                ->default(true),
        ])
    ]);
    }

    public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            // Esto hará que el nombre aparezca y se pueda buscar
            TextColumn::make('name')
                ->label('Nombre')
                ->searchable()
                ->sortable(),

            // Muestra el nombre de la categoría padre
            TextColumn::make('parent.name')
                ->label('Padre')
                ->badge()
                ->color('info')
                ->placeholder('Principal'),

            // Muestra un icono de check verde si es visible
            IconColumn::make('is_visible')
                ->label('Visible')
                ->boolean(),

            TextColumn::make('created_at')
                ->label('Creado')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
