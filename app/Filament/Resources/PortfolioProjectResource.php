<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioProjectResource\Pages;
use App\Models\PortfolioProject;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PortfolioProjectResource extends Resource
{
    protected static ?string $model = PortfolioProject::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Portofolio Proyek';

    protected static ?string $modelLabel = 'Portofolio';

    protected static ?string $pluralModelLabel = 'Portofolio Proyek';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Detail Proyek')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Proyek')
                            ->required()
                            ->maxLength(150),
                        Forms\Components\TextInput::make('client_name')
                            ->label('Nama Klien')
                            ->maxLength(120),
                        Forms\Components\FileUpload::make('image_path')
                            ->label('Gambar')
                            ->disk('public')
                            ->directory('portfolio')
                            ->image()
                            ->imageEditor()
                            ->requiredWithout('image_url')
                            ->helperText('Upload gambar atau isi URL gambar di bawah.')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('image_url')
                            ->label('URL Gambar (opsional)')
                            ->requiredWithout('image_path')
                            ->dehydrateStateUsing(static fn (?string $state): ?string => filled($state) ? $state : null)
                            ->maxLength(500),
                        Forms\Components\TextInput::make('project_url')
                            ->label('URL Proyek')
                            ->maxLength(500),
                    ])
                    ->columns(2),
                Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client_name')
                    ->label('Klien')
                    ->toggleable(),
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
            'index' => Pages\ListPortfolioProjects::route('/'),
            'create' => Pages\CreatePortfolioProject::route('/create'),
            'edit' => Pages\EditPortfolioProject::route('/{record}/edit'),
        ];
    }
}
