<?php

namespace App\Filament\Pages\Settings;

use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Outerweb\FilamentSettings\Filament\Pages\Settings as BaseSettings;

class Settings extends BaseSettings
{
    protected static ?string $navigationGroup = 'Setting';
    protected static ?int $navigationSort = 999;



    public function schema(): array|Closure
    {
        return [
            Tabs::make('Settings')
                ->schema([
                    Tabs\Tab::make('General')
                        ->schema([
                            TextInput::make('general.brand_name')
                                ->label('Nama Web'),
                            Grid::make()
                                ->schema([
                                    TextInput::make('general.phone')
                                        ->label('Nomor Telephone'),
                                    TextInput::make('general.email')
                                        ->label('Email'),
                                    TextInput::make('general.description')
                                        ->label('Deskripsi'),
                                    TextInput::make('general.address')
                                        ->label('Alamat'),
                                    FileUpload::make('general.logo')
                                        ->image()
                                        ->imageEditor()
                                        ->disk('public')
                                        ->directory('general')
                                        ->label('Logo'),
                                    FileUpload::make('general.favicon')
                                        ->image()
                                        ->imageEditor()
                                        ->disk('public')
                                        ->directory('general')
                                        ->label('Fav Icon'),
                                ])
                        ]),
                    Tabs\Tab::make('Seo')
                        ->schema([
                            Grid::make()
                                ->schema([
                                    TextInput::make('seo.title')
                                        ->label("Judul"),
                                    Textarea::make('seo.description')
                                        ->label("Deskripsi"),
                                ])
                        ]),
                    Tabs\Tab::make('Sosial Media')
                        ->schema([
                            Grid::make()
                                ->schema([
                                    TextInput::make('sosialMedia.youtube')
                                        ->label('Youtube'),
                                    TextInput::make('sosialMedia.tiktok')
                                        ->label('Tiktok'),
                                    TextInput::make('sosialMedia.facobook')
                                        ->label('Facebook'),
                                    TextInput::make('sosialMedia.instagram')
                                        ->label('Instagram'),
                                ])
                        ]),
                    Tabs\Tab::make('Tentang')
                        ->schema([
                            RichEditor::make('about')
                                ->label("Deskripsi"),
                        ]),
                    Tabs\Tab::make('No Rekening Bank')
                        ->schema([
                            Grid::make()
                                ->schema([
                                    TextInput::make('bank.name')
                                        ->label("Nama Bank"),
                                    TextInput::make('bank.username')
                                        ->label("Atas Nama"),
                                    TextInput::make('bank.no_rekening')
                                        ->label("Nomor Rekening"),
                                ])
                        ]),
                    Tabs\Tab::make('Midrant Gateaway')
                        ->schema([
                            Section::make("Midrants GateAway")
                                ->description('Silahkan Cek Di Dashboard Midarnts Anda Untuk Melihat Secret Key')
                                ->schema([
                                    TextInput::make('midrants.merchant_id')
                                        ->required()
                                        ->label("Merchant Id"),
                                    TextInput::make('midrants.client_key')
                                        ->required()
                                        ->label("Client Key"),
                                    TextInput::make('midrants.server_key')
                                        ->required()
                                        ->label("Server Key"),
                                    // Toggle::make('midrants.is_production')
                                    //     ->required()
                                    //     ->label('Production'),
                                    // Toggle::make('midrants.is_sanitized')
                                    //     ->required()
                                    //     ->label('Sanitized'),
                                    // Toggle::make('midrants.is_IS3DS')
                                    //     ->required()
                                    //     ->label('IS3DS'),

                                ])
                        ]),
                    Tabs\Tab::make('Wa Gateaway')
                        ->schema([
                            Grid::make()
                                ->schema([
                                    TextInput::make('wa.fonte_token')
                                        ->label("Fonte Token"),
                                ])
                        ]),
                ]),

        ];
    }
}
