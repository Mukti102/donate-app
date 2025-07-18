<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoInspirationResource\Pages;
use App\Filament\Resources\VideoInspirationResource\RelationManagers;
use App\Models\VideoInspiration;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VideoInspirationResource extends Resource
{
    protected static ?string $model = VideoInspiration::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationGroup = 'Utama';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->maxLength(255),
                // Forms\Components\FileUpload::make('video')
                //     ->disk('public')
                //     ->directory('inspiration')
                //     ->required(),
                Forms\Components\TextInput::make('video')
                    ->label('Embed Youtube')
                    ->placeholder('https://www.youtube.com/embed/RWeK5wDW6LY')
                    ->required(),
                    Forms\Components\Textarea::make('description')
                        ->columnSpanFull(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video')
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
            'index' => Pages\ListVideoInspirations::route('/'),
            'create' => Pages\CreateVideoInspiration::route('/create'),
            'edit' => Pages\EditVideoInspiration::route('/{record}/edit'),
        ];
    }
}
