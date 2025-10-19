<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SimulasiResource\Pages;
use App\Models\Simulasi;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use BackedEnum;
use UnitEnum;

class SimulasiResource extends Resource
{
    protected static ?string $model = Simulasi::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-banknotes';
    protected static UnitEnum|string|null $navigationGroup = 'Simulasi Kredit';
    protected static ?string $navigationLabel = 'Riwayat Simulasi';

    // ✅ FORM (Filament v4 Schema)
    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('otr')
                ->label('Harga OTR (Rp)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('dp_percent')
                ->label('DP (%)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('dp_nominal')
                ->label('DP Nominal (Rp)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('pokok_pinjaman')
                ->label('Pokok Pinjaman (Rp)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('tenor')
                ->label('Tenor (bulan)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('bunga_tahun')
                ->label('Bunga per Tahun (%)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('angsuran_per_bulan')
                ->label('Angsuran per Bulan (Rp)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('total_bunga')
                ->label('Total Bunga (Rp)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('total_pembayaran')
                ->label('Total Pembayaran (Rp)')
                ->numeric()
                ->required(),

            Forms\Components\Textarea::make('jadwal')
                ->label('Jadwal Cicilan (JSON)')
                ->rows(5),
        ]);
    }

    // ✅ TABLE
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('otr')
                    ->label('Harga OTR')
                    ->money('IDR', true),

                Tables\Columns\TextColumn::make('dp_nominal')
                    ->label('DP Nominal')
                    ->money('IDR', true),

                Tables\Columns\TextColumn::make('pokok_pinjaman')
                    ->label('Pokok Pinjaman')
                    ->money('IDR', true),

                Tables\Columns\TextColumn::make('tenor')
                    ->label('Tenor (bulan)')
                    ->sortable(),

                Tables\Columns\TextColumn::make('angsuran_per_bulan')
                    ->label('Angsuran / Bulan')
                    ->money('IDR', true),

                Tables\Columns\TextColumn::make('total_pembayaran')
                    ->label('Total Pembayaran')
                    ->money('IDR', true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Simulasi')
                    ->dateTime('d M Y H:i'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index'  => Pages\ListSimulasis::route('/'),
            'create' => Pages\CreateSimulasi::route('/create'),
            'edit'   => Pages\EditSimulasi::route('/{record}/edit'),
        ];
    }
}
