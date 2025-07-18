<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryArticleResource\Pages;
use App\Filament\Resources\CategoryArticleResource\RelationManagers;
use App\Models\CategoryArticle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryArticleResource extends Resource
{
    protected static ?string $model = CategoryArticle::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $navigationGroup = 'Utama';
    protected static ?string $navigationLabel = 'Kategory Laporan Kegiatan';
    
    
      public static function getModelLabel(): string
{
    return 'Kategory Laporan Kegiatan';
}

public static function getPluralModelLabel(): string
{
    return 'Kategory Laporan Kegiatan';
}


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Menambahkan section untuk inputan
                Forms\Components\Section::make('Category Information') // Optional: Judul Section
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Category Name'), // Optional: Label untuk input
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([ /* Filters */])
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
        return [ /* Relations */];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategoryArticles::route('/'),
            'create' => Pages\CreateCategoryArticle::route('/create'),
            'edit' => Pages\EditCategoryArticle::route('/{record}/edit'),
        ];
    }
}
