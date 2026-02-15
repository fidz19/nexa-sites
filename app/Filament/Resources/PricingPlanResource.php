<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PricingPlanResource\Pages;
use App\Models\PricingPlan;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PricingPlanResource extends Resource
{
    protected static ?string $model = PricingPlan::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Paket Harga';

    protected static ?string $modelLabel = 'Paket Harga';

    protected static ?string $pluralModelLabel = 'Paket Harga';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Paket')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Paket')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('description')
                            ->label('Deskripsi')
                            ->maxLength(255),
                    ])
                    ->columns(2),
                Section::make('Harga & CTA')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->label('Harga (Rp)')
                            ->numeric()
                            ->minValue(0)
                            ->helperText('Kosongkan jika harga kustom.'),
                        Forms\Components\TextInput::make('price_label')
                            ->label('Label Harga')
                            ->placeholder('Kustom'),
                        Forms\Components\TextInput::make('price_unit')
                            ->label('Satuan Harga')
                            ->default('proyek')
                            ->maxLength(50)
                            ->dehydrateStateUsing(static fn (?string $state): string => $state ?: 'proyek'),
                        Forms\Components\TextInput::make('cta_label')
                            ->label('Teks Tombol')
                            ->default('Pilih Paket')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('cta_link')
                            ->label('Link Tombol')
                            ->default('#contact')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge')
                            ->placeholder('Paling Populer'),
                    ])
                    ->columns(2),
                Section::make('Fitur')
                    ->schema([
                        Forms\Components\Repeater::make('features')
                            ->label('Daftar Fitur')
                            ->schema([
                                Forms\Components\TextInput::make('feature')
                                    ->label('Fitur')
                                    ->required(),
                            ])
                            ->addActionLabel('Tambah Fitur')
                            ->defaultItems(0)
                            ->reorderable(),
                    ]),
                Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Paket Unggulan')
                            ->default(false),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Paket')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Harga')
                    ->formatStateUsing(function ($state, PricingPlan $record): string {
                        if ($state !== null) {
                            return 'Rp '.number_format((int) $state, 0, ',', '.');
                        }

                        return $record->price_label ?: 'Kustom';
                    }),
                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->actions([
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPricingPlans::route('/'),
            'create' => Pages\CreatePricingPlan::route('/create'),
            'edit' => Pages\EditPricingPlan::route('/{record}/edit'),
        ];
    }
}
