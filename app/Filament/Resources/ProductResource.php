<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Card::make()->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    // Solo se ejecuta si estamos CREANDO, no editando
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                        $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                Forms\Components\TextInput::make('slug')
                    ->label('URL Amigable (Slug)') // Cambia el nombre de la etiqueta
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->unique(Product::class, 'slug', ignoreRecord: true),

                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull()
                    ->lazy() // No envía datos hasta que hagas clic fuera o guardes
                    ->dehydrated(true), // Asegura que los datos se guarden correctamente

                Forms\Components\Select::make('category_id')
                ->label('Categoría')
                ->relationship('category', 'name') // Esto buscará automáticamente las categorías que crees
                ->searchable()
                ->preload()
                ->required(),

                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('price')
                        ->numeric()
                        ->prefix('S/')
                        ->required(),
                    Forms\Components\TextInput::make('sale_price')
                        ->numeric()
                        ->prefix('S/'),
                ]),

                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->label('Imagen del Producto')
                    ->image() // Valida que sea imagen
                    ->live(false) // <--- CRÍTICO: Evita que la subida de imagen refresque todo el formulario
                    ->maxSize(2048), // Limita a 2MB para que no pese la carga
                    /*->directory('products') // Carpeta donde se guarda
                    ->visibility('public') // Asegura que sea visible
                    ->preserveFilenames() // Opcional: mantiene el nombre original
                    ->imageEditor() // Opcional: permite recortar la imagen
                    ->downloadable() // Permite descargarla desde el panel
                    ->openable() // Permite verla en grande
                    ->required(fn (string $operation): bool => $operation === 'create'),*/ // Solo obligatoria al crear

                Forms\Components\Toggle::make('is_active')
                    ->default(true),
                
                Forms\Components\Toggle::make('is_featured'),
            ])
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
        ->columns([
            Tables\Columns\ImageColumn::make('image'),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('price')->money('usd')->sortable(),
            Tables\Columns\TextColumn::make('stock')->sortable(),
            Tables\Columns\IconColumn::make('is_active')->boolean(),
        ])
        ->filters([
            // Aquí podremos añadir filtros por categoría luego
        ])
        ->actions([
            // ESTA ES LA LÍNEA QUE NECESITAS:
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
