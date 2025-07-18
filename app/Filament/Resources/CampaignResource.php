<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignResource\Pages;
use App\Filament\Resources\CampaignResource\RelationManagers;
use App\Models\Campaign;
use App\Models\CategoryCampaign;  // Pastikan ini diimport untuk select
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationGroup = 'Utama';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        // Thumbnail Field (FileUpload)
                        Forms\Components\FileUpload::make('thumbnail')
                            ->disk('public')
                            ->directory('campaign')
                            ->imageEditor()
                            ->image()
                            ->required(),

                        // Category Campaign Field (Select)
                        Forms\Components\Select::make('category_campaign_id')
                            ->label('Category Campaign')
                            ->options(CategoryCampaign::all()->pluck('name', 'id'))
                            ->required()
                            ->searchable(),  // Menambahkan opsi untuk pencarian

                        // Name Lembaga Field
                        Forms\Components\TextInput::make('name_lembaga')
                            ->default('0')
                            ->maxLength(255),

                        // Logo Lembaga Field (FileUpload)
                        // Forms\Components\FileUpload::make('logo_lembaga')  // Changed to FileUpload
                        //     ->disk('public')
                        //     ->imageEditor()
                        //     ->directory('campaign')
                        //     ->image(),

                        // Dedline Field (DatePicker)
                        Forms\Components\DatePicker::make('dedline')
                            ->required()
                            ->label('Deadline'),

                        // Dedline Field (DatePicker)
                        Forms\Components\TextInput::make('target')
                            ->required()
                            ->numeric()
                            ->prefix('Rp')
                            ->label('Target Donasi'),
                        
                        Forms\Components\TextInput::make('youtube_link')
                            ->nullable()
                            ->placeholder('https://www.youtube.com/embed/RWeK5wDW6LY')
                            ->maxLength(255),
                            
                        // Story Field (Text Editor)
                        Forms\Components\RichEditor::make('story')
                            ->label('Cerita')
                            ->required()
                            ->columnSpanFull(),

                        // Penyaluran Field (Text Editor)
                        Forms\Components\RichEditor::make('penyaluran')
                            ->columnSpanFull(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name_lembaga')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dedline')
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
            ->filters([/* Filters */])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [/* Relations */];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCampaigns::route('/'),
            'create' => Pages\CreateCampaign::route('/create'),
            'edit' => Pages\EditCampaign::route('/{record}/edit'),
        ];
    }
}
