<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryCampaignResource\Pages;
use App\Filament\Resources\CategoryCampaignResource\RelationManagers;
use App\Models\CategoryCampaign;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\Card;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryCampaignResource extends Resource
{
    protected static ?string $model = CategoryCampaign::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';
    protected static ?string $navigationGroup = 'Utama';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Adding the Card to group form fields
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('subtitle')
                            ->label('sub Judul')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('icon')
                            ->label('Icon Font Awesome')
                            ->required()
                            ->maxLength(255),
                        // Forms\Components\FileUpload::make('image')
                        // ->label('Icon')    
                        // ->imageEditor()
                        // ->image(),
                    ])
                    ->columns(2) // You can adjust this number for how many columns you want
                    ->heading('Kategory Campaign ') // Optional: Add a heading
                    ->description('Masukkan Kategory Campaign') // Optional: Add a description
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListCategoryCampaigns::route('/'),
            'create' => Pages\CreateCategoryCampaign::route('/create'),
            'edit' => Pages\EditCategoryCampaign::route('/{record}/edit'),
        ];
    }
}
