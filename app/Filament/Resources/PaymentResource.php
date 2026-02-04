<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationLabel = 'Laporan Pembayaran';
    protected static ?string $modelLabel = 'Pembayaran';
    protected static ?string $pluralModelLabel = 'Pembayaran';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_id')->searchable()->copyable(),
                Tables\Columns\TextColumn::make('user.name')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('user.email')->label('Email')->searchable(),
                Tables\Columns\TextColumn::make('jenis')
                    ->badge()
                    ->formatStateUsing(fn ($s) => $s === 'registrasi' ? 'Registrasi' : 'Tahap Awal')
                    ->color(fn ($s) => $s === 'registrasi' ? 'info' : 'success'),
                Tables\Columns\TextColumn::make('jumlah')->money('idr')->sortable(),
                Tables\Columns\TextColumn::make('status')->badge()
                    ->color(fn ($s) => in_array($s, ['capture', 'settlement']) ? 'success' : (in_array($s, ['pending', 'challenge']) ? 'warning' : 'danger')),
                Tables\Columns\TextColumn::make('paid_at')->dateTime('d/m/Y H:i')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d/m/Y H:i')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jenis')->options([
                    'registrasi' => 'Registrasi',
                    'awal' => 'Tahap Awal',
                ]),
                Tables\Filters\SelectFilter::make('status')->options([
                    'pending' => 'Pending',
                    'capture' => 'Capture',
                    'settlement' => 'Settlement',
                    'deny' => 'Deny',
                    'expire' => 'Expire',
                ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
