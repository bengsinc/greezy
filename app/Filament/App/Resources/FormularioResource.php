<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\FormularioResource\Pages;
use App\Filament\App\Resources\FormularioResource\RelationManagers;
use App\Models\Formulario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormularioResource extends Resource
{
    protected static ?string $model = Formulario::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $modelLabel = 'Formulário';
    protected static ?string $pluralModelLabel = 'Formulários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->columnSpanFull()
                    ->label('Titulo do formulário'),
                Forms\Components\RichEditor::make('descricao')
                    ->columnSpanFull()
                    ->label('Descrição do formulário'),
                Forms\Components\CheckboxList::make('entregavel')
                    ->relationship('entregavel', 'nome')
                    ->label('Selecione os entregáveis do formulário'),
                Forms\Components\Select::make('modelo_contrato_id')
                    ->searchable()
                    ->label('Selecione o Modelo de Contrato')
                    ->preload()
                    ->options(function () {
                        return ModeloContrato::query()->where('status', 'ativo')->get()->mapWithKeys(function ($modelo) {
                            return [$modelo->id => "{$modelo->nome} "];
                        })->toArray();
                    }),
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
            'index' => Pages\ListFormularios::route('/'),
            'create' => Pages\CreateFormulario::route('/create'),
            'edit' => Pages\EditFormulario::route('/{record}/edit'),
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
