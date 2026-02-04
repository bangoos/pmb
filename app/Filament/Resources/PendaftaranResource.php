<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Models\Pendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Verifikasi Pendaftar';
    protected static ?string $modelLabel = 'Pendaftaran';
    protected static ?string $pluralModelLabel = 'Pendaftaran';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Pendaftaran')->schema([
                    Forms\Components\Select::make('user_id')
                        ->relationship('user', 'name')
                        ->required()
                        ->searchable()
                        ->disabled(),
                    Forms\Components\Select::make('jalur_pendaftaran_id')
                        ->relationship('jalurPendaftaran', 'nama')
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('program_studi_id')
                        ->relationship('programStudi', 'nama')
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('tahap')
                        ->options([
                            1 => 'Terdaftar',
                            2 => 'Sudah Bayar',
                            3 => 'Tes Selesai',
                            4 => 'Biodata & Dokumen',
                            5 => 'Diterima',
                            6 => 'Daftar Ulang',
                        ])
                        ->required(),
                    Forms\Components\Toggle::make('tes_selesai')->label('Tes Selesai'),
                    Forms\Components\TextInput::make('nilai_tes')->numeric()->suffix(' poin'),
                    Forms\Components\Toggle::make('biodata_lengkap')->label('Biodata Lengkap'),
                    Forms\Components\Toggle::make('dokumen_terverifikasi')->label('Dokumen Terverifikasi'),
                    Forms\Components\TextInput::make('nim')->maxLength(20),
                    Forms\Components\TextInput::make('gelombang')->maxLength(50),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user.email')->label('Email')->searchable(),
                Tables\Columns\TextColumn::make('jalurPendaftaran.nama')->label('Jalur')->sortable(),
                Tables\Columns\TextColumn::make('programStudi.nama')->label('Prodi')->sortable(),
                Tables\Columns\TextColumn::make('tahap')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ((int) $state) {
                        1 => 'Terdaftar',
                        2 => 'Bayar',
                        3 => 'Tes',
                        4 => 'Biodata',
                        5 => 'Diterima',
                        6 => 'Daftar Ulang',
                        default => $state,
                    })
                    ->color(fn ($state) => match ((int) $state) {
                        5, 6 => 'success',
                        2, 3, 4 => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\IconColumn::make('tes_selesai')->boolean()->label('Tes'),
                Tables\Columns\IconColumn::make('dokumen_terverifikasi')->boolean()->label('Dokumen'),
                Tables\Columns\TextColumn::make('nim')->label('NIM')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d/m/Y')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tahap')
                    ->options([
                        1 => 'Terdaftar',
                        2 => 'Sudah Bayar',
                        3 => 'Tes Selesai',
                        4 => 'Biodata & Dokumen',
                        5 => 'Diterima',
                        6 => 'Daftar Ulang',
                    ]),
                Tables\Filters\SelectFilter::make('jalur_pendaftaran_id')
                    ->relationship('jalurPendaftaran', 'nama')
                    ->label('Jalur'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftaran::route('/'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
            'view' => Pages\ViewPendaftaran::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'jalurPendaftaran', 'programStudi']);
    }
}
