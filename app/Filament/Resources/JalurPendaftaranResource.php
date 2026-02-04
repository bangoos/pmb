<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JalurPendaftaranResource\Pages;
use App\Models\JalurPendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JalurPendaftaranResource extends Resource
{
    protected static ?string $model = JalurPendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationLabel = 'Jalur Pendaftaran';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required()->maxLength(255),
                Forms\Components\TextInput::make('kode')->required()->maxLength(20)->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('diskon_spp')->numeric()->suffix('%')->default(0),
                Forms\Components\TagsInput::make('syarat_dokumen')->label('Syarat Dokumen (contoh: foto, ijazah, ktp)'),
                Forms\Components\Textarea::make('deskripsi')->rows(3),
                Forms\Components\TextInput::make('urutan')->numeric()->default(0),
                Forms\Components\Toggle::make('aktif')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('urutan')->sortable(),
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('kode')->searchable(),
                Tables\Columns\TextColumn::make('diskon_spp')->suffix('%'),
                Tables\Columns\IconColumn::make('aktif')->boolean(),
            ])
            ->defaultSort('urutan')
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJalurPendaftaran::route('/'),
            'create' => Pages\CreateJalurPendaftaran::route('/create'),
            'edit' => Pages\EditJalurPendaftaran::route('/{record}/edit'),
        ];
    }
}
