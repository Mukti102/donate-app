<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonaturResource\Pages;
use App\Filament\Resources\DonaturResource\RelationManagers;
use App\Models\Donatur;
use App\Models\Campaign;  // Pastikan ini diimport untuk select
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DonaturResource extends Resource
{
    protected static ?string $model = Donatur::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Utama';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section for Donatur Information
                Forms\Components\Section::make('Donatur Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Name'),
                        Forms\Components\TextInput::make('phone')
                            ->label('Nomor Whatsapp')
                            ->required()
                            ->maxLength(255),
                         Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->required()
                            ->maxLength(255)
                            ->label('Kota'),


                        // Campaign Field (Select)
                        Forms\Components\Select::make('campaign_id')
                            ->label('Campaign')
                            ->options(Campaign::all()->pluck('title', 'id'))  // Mengambil pilihan dari model Campaign
                            ->required()
                            ->searchable(),  // Menambahkan pencarian untuk memudahkan pemilihan kampanye

                        Forms\Components\TextInput::make('amount')
                            ->label('Jumlah')
                            ->required()
                            ->prefix("Rp")
                            ->maxLength(255)
                            ->label('Amount'),

                        // Doa Field
                        Forms\Components\Textarea::make('doa')
                            ->required()
                            ->columnSpanFull()
                            ->label('Doa'),

                        Select::make("status_pembayaran")
                            ->label('Status Pembayaran')
                            ->options([
                                'pending' => 'Belum Bayar',
                                'success' => 'Sudah Bayar',
                                'failed' => 'Gagal',
                            ])
                            ->required()
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('campaign_id')
                    ->label('Campaign')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn($state) => Campaign::find($state)?->title ?? 'N/A'),  // Menampilkan nama kampanye
                Tables\Columns\TextColumn::make('amount')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_pembayaran')
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
            ->filters([/* Filters */])
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
            'index' => Pages\ListDonaturs::route('/'),
            'create' => Pages\CreateDonatur::route('/create'),
            'edit' => Pages\EditDonatur::route('/{record}/edit'),
        ];
    }
}
