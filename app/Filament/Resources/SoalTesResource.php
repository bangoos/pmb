<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SoalTesResource\Pages;
use App\Models\SoalTes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SoalTesResource extends Resource
{
    protected static ?string $model = SoalTes::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationLabel = 'Bank Soal Tes';
    protected static ?string $modelLabel = 'Soal Tes';
    protected static ?string $pluralModelLabel = 'Soal Tes';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Soal')->schema([
                    Forms\Components\Textarea::make('pertanyaan')->required()->rows(3)->columnSpanFull(),
                    Forms\Components\TextInput::make('opsi_a')->required()->label('Opsi A'),
                    Forms\Components\TextInput::make('opsi_b')->required()->label('Opsi B'),
                    Forms\Components\TextInput::make('opsi_c')->label('Opsi C'),
                    Forms\Components\TextInput::make('opsi_d')->label('Opsi D'),
                    Forms\Components\Select::make('jawaban_benar')
                        ->options(['a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D'])
                        ->required()
                        ->label('Jawaban Benar'),
                    Forms\Components\TextInput::make('kategori')->maxLength(50),
                    Forms\Components\TextInput::make('urutan')->numeric()->default(0),
                    Forms\Components\Toggle::make('aktif')->default(true),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('urutan')->sortable(),
                Tables\Columns\TextColumn::make('pertanyaan')->limit(60)->searchable()->wrap(),
                Tables\Columns\TextColumn::make('jawaban_benar')->badge()->formatStateUsing(fn ($s) => strtoupper($s)),
                Tables\Columns\TextColumn::make('kategori'),
                Tables\Columns\IconColumn::make('aktif')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d/m/Y')->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('aktif')->label('Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('urutan');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSoalTes::route('/'),
            'create' => Pages\CreateSoalTes::route('/create'),
            'edit' => Pages\EditSoalTes::route('/{record}/edit'),
        ];
    }
}
