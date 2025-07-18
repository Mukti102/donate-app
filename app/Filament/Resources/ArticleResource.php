<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\CategoryArticle;  // Pastikan ini diimport untuk select
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Utama';
    protected static ?string $navigationLabel = 'Laporan Kegiatan';

    public static function getModelLabel(): string
{
    return 'Laporan Kegiatan';
}

public static function getPluralModelLabel(): string
{
    return 'Laporan Kegiatan';
}



    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // Section for Article Content
                Forms\Components\Section::make('Article Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->label('Title'),
                Forms\Components\Select::make('category_article_id')
                    ->label('Category')
                    ->options(CategoryArticle::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                        Forms\Components\FileUpload::make('tumbnail')
                            ->required()
                            ->disk('public')
                            ->directory('articles')
                            ->label('Thumbnail'),
                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->label('Content')
                            ->columnSpanFull(),
                       
                    ])->columns(2),

                // Section for Tags
                Forms\Components\Section::make('Tags')
                    ->schema([
                        Forms\Components\TagsInput::make('tags')
                            ->label('Tags')
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('tumbnail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
