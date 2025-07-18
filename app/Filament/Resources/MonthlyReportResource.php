<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MonthlyReportResource\Pages;
use App\Filament\Resources\MonthlyReportResource\RelationManagers;
use App\Models\MonthlyReport;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class MonthlyReportResource extends Resource
{
    protected static ?string $model = MonthlyReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Utama';
    protected static ?string $navigationLabel = 'Laporan Bulanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    DatePicker::make('periode')
                        ->label('Periode')
                        ->required()
                        ->displayFormat('F Y') // Contoh: Juni 2025
                        ->format('Y-m') // Disimpan sebagai 2025-06
                        ->withoutTime()
                        ->closeOnDateSelection()
                        ->native(false)
                        ->maxDate(now()), // Opsional: agar tidak bisa pilih tanggal di masa depan

                    FileUpload::make('file_path')
                        ->label('File')
                        ->disk('public') // sesuaikan jika kamu pakai disk berbeda
                        ->directory('monthly-reports')
                        ->preserveFilenames()
                        ->required(),

                    Select::make('file_type')
                        ->options([
                            'PDF' => 'PDF',
                            'IMG' => 'Image',
                            'DOC' => 'Word Document',
                            'XLS' => 'Excel Spreadsheet',
                            'ZIP' => 'ZIP Archive',
                            'TXT' => 'Text File',
                        ])
                        ->required(),

                    TextInput::make('size')
                        ->label('Size (optional)')
                        ->maxLength(255)
                        ->helperText('e.g., 1.2 MB')
                        ->placeholder('e.g. 1.2 MB'),
                ])->columns(2),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('periode')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('file_path')
                    ->label('File Path')
                    ->limit(30)
                    ->copyable()
                    ->tooltip(fn($record) => $record->file_path),

                BadgeColumn::make('file_type')
                    ->colors([
                        'success' => 'PDF',
                        'info' => 'IMG',
                        'warning' => 'DOC',
                        'primary' => 'XLS',
                        'danger' => 'ZIP',
                        'gray' => 'TXT',
                    ])
                    ->sortable(),

                TextColumn::make('size')
                    ->label('Size')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Uploaded At')
                    ->dateTime('d M Y, H:i'),
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
            'index' => Pages\ListMonthlyReports::route('/'),
            'create' => Pages\CreateMonthlyReport::route('/create'),
            'edit' => Pages\EditMonthlyReport::route('/{record}/edit'),
        ];
    }
}
