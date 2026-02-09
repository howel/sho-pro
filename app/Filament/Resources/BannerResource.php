<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    // Cambiamos el icono a uno de "fotos" o "galería" para que sea más intuitivo
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    protected static ?string $navigationLabel = 'Banners del Slider';
    
    protected static ?string $modelLabel = 'Banner';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Section::make('Contenido del Banner')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('label')
                            ->label('Etiqueta Superior')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title')
                            ->label('Título Principal')
                            ->required(),
                    ]),
                    
                    Forms\Components\Textarea::make('subtitle')
                        ->label('Descripción'),

                    Forms\Components\FileUpload::make('image')
                        ->label('Imagen Panorámica')
                        ->image()
                        ->directory('banners')
                        ->required()
                        ->imageEditor()
                        ->imageEditorAspectRatios(['16:5']),

                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('link')
                            ->label('URL Enlace'),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Orden')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),
                    ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Miniatura de la imagen
                ImageColumn::make('image')
                    ->label('Imagen')
                    ->rounded()
                    ->size(100),

                // Título principal
                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                // Etiqueta
                TextColumn::make('label')
                    ->label('Etiqueta')
                    ->badge()
                    ->color('danger'),

                // Orden
                TextColumn::make('sort_order')
                    ->label('Orden')
                    ->sortable(),

                // Estado con icono verde/rojo
                IconColumn::make('is_active')
                    ->label('Estado')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order', 'asc') // Ordenar por 'Orden' por defecto
            ->filters([
                Tables\Filters\ToggledFilter::make('is_active')
                    ->label('Solo Activos'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}