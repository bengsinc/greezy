<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\EntregavelResource\Pages;
use App\Filament\App\Resources\EntregavelResource\RelationManagers;
use App\Models\Entregavel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntregavelResource extends Resource
{
    protected static ?string $model = Entregavel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Entregáveis';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->columnSpanFull()
                    ->label('Titulo'),
                Forms\Components\RichEditor::make('descricao')
                    ->columnSpanFull()
                    ->label('Conteúdo do entregável'),

                Forms\Components\FileUpload::make('icone')
                    ->label('icone que representa o serviço em formato png com fundo transparente (máximo 1MB)')
                    ->openable(true)
                    ->columnSpanFull()
                    ->directory('icones')
                    ->previewable(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome'),
                Tables\Columns\TextColumn::make('status')
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListEntregavels::route('/'),
            'create' => Pages\CreateEntregavel::route('/create'),
            'edit' => Pages\EditEntregavel::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
