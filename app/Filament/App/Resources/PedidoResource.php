<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\EntregaveisPedidoResource\RelationManagers\PedidoEntregavelRelationManager;
use App\Filament\Resources\PedidoResource\Pages;
use App\Filament\Resources\PedidoResource\RelationManagers;
use App\Models\Pedido;
use App\Models\PedidoEntregavel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;

class PedidoResource extends Resource
{
    protected static ?string $model = Pedido::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('numero')
                    ->maxLength(255)
                    ->disabled()
                    ->columnSpan(1),
                Forms\Components\Textarea::make('observacao')
                    ->disabled()
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('orcamento')
                    ->maxLength(255)
                    ->disabled()
                    ->columnSpan(1),
                Forms\Components\TextInput::make('tipo_pagamento')
                    ->maxLength(255)
                    ->disabled()
                    ->columnSpan(1),
                Forms\Components\TextInput::make('forma_pagamento')
                    ->maxLength(255)
                    ->disabled()
                    ->columnSpan(1),
                Forms\Components\TextInput::make('nome')
                    ->label('Solicitante')
                    ->maxLength(255),
                PhoneNumber::make('telefone')
                    ->format('(99)99999-9999'),
                Forms\Components\TextInput::make('email')
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'aguardando análise' => 'Aguardando Análise',
                        'em analise' => 'Em análise',
                        'aguardando cliente' => 'Aguardando cliente',
                        'cancelado' => 'Cancelado',
                        'aceito' => 'Aceito',
                        'concluido' => 'Concluído',
                    ]),







            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->where('cliente_id', auth()->id()))
            ->columns([
                Tables\Columns\TextColumn::make('numero')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
           // PedidoEntregavelRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\App\Resources\PedidoResource\Pages\ListPedidos::route('/'),
            'create' => \App\Filament\App\Resources\PedidoResource\Pages\CreatePedido::route('/create'),
            'edit' => \App\Filament\App\Resources\PedidoResource\Pages\EditPedido::route('/{record}/edit'),
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
