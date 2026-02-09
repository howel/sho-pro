<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Productos';
    protected static ?string $modelLabel = 'Producto';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    Section::make('Información General')
                        ->schema([
                            TextInput::make('name')
                                ->label('Nombre del Producto')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) =>
                                    $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                            TextInput::make('slug')
                                ->label('URL Amigable (Slug)')
                                ->disabled()
                                ->dehydrated()
                                ->required()
                                ->unique(Product::class, 'slug', ignoreRecord: true),

                            RichEditor::make('description')
                                ->label('Descripción Detallada')
                                ->columnSpanFull(),

                            Select::make('category_id')
                                ->label('Categoría')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                        ])->columnSpan(2),

                    Section::make('Inventario y Estado')
                        ->schema([
                            TextInput::make('price')
                                ->label('Precio Normal')
                                ->numeric()
                                ->prefix('S/')
                                ->required(),

                            TextInput::make('sale_price')
                                ->label('Precio Oferta')
                                ->numeric()
                                ->prefix('S/'),

                            TextInput::make('stock')
                                ->label('Stock Disponible')
                                ->numeric()
                                ->default(0)
                                ->required(),

                            Toggle::make('is_active')
                                ->label('¿Producto Activo?')
                                ->default(true),

                            Toggle::make('is_featured')
                                ->label('¿Destacar en Inicio?'),
                        ])->columnSpan(1),

                    Section::make('Multimedia (Fotos)')
                        ->schema([
                            FileUpload::make('image')
                                ->label('Imagen de Portada (Principal)')
                                ->image()
                                ->directory('products')
                                ->imageEditor()
                                ->required(),

                            FileUpload::make('images')
                                ->label('Galería Adicional')
                                ->image()
                                ->directory('products-gallery')
                                ->multiple() // Activa selección múltiple
                                ->reorderable() // Permite arrastrar para ordenar
                                ->appendFiles()
                                ->maxFiles(5)
                                ->columnSpanFull(),
                        ])->columnSpanFull(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->circular(),
                
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Precio')
                    ->money('PEN')
                    ->sortable(),

                TextColumn::make('stock')
                    ->label('Stock')
                    ->badge()
                    ->color(fn ($state) => $state <= 5 ? 'danger' : 'success')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Categoría'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    // --- PERMISOS ABIERTOS ---
    public static function canViewAny(): bool { return true; }
    public static function canCreate(): bool { return true; }
    public static function canEdit($record): bool { return true; }
    public static function canDelete($record): bool { return true; }
}