<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\EntregaveisPedidoResource\RelationManagers\PedidoEntregavelRelationManager;
use App\Filament\Resources\PedidoResource\Pages;
use App\Filament\Resources\PedidoResource\RelationManagers;
use App\Models\Pedido;
use App\Models\PedidoEntregavel;
use Filament\Actions\Action;
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
                Forms\Components\Section::make('Detalhes do Pedido')
                    ->schema([
                        Forms\Components\TextInput::make('numero')
                            ->label('Número do pedido')
                            ->maxLength(255)
                            ->disabled(),
                        Forms\Components\Textarea::make('observacao')
                            ->label('Observação do cliente')
                            ->disabled(),
                        // Outros campos relacionados aos detalhes do pedido
                    ]),
                Forms\Components\Section::make('Informações de Pagamento')
                    ->schema([
                        Forms\Components\TextInput::make('orcamento')
                            ->label('Orçamento')
                            ->maxLength(255)
                            ->disabled()
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('tipo_pagamento')
                            ->label('Tipo de pagamento')
                            ->maxLength(255)
                            ->disabled()
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('forma_pagamento')
                            ->label('Forma de pagamento')
                            ->maxLength(255)
                            ->disabled()
                            ->columnSpan(1),
                        // Outros campos relacionados às informações de pagamento
                    ]),
                Forms\Components\Section::make('Informações do Solicitante')
                    ->schema([
                        Forms\Components\TextInput::make('nome')
                            ->label('Solicitante')
                            ->maxLength(255),
                        PhoneNumber::make('telefone')
                            ->format('(99)99999-9999'),
                        Forms\Components\TextInput::make('email')
                            ->maxLength(255),
                        // Outros campos relacionados ao solicitante
                    ]),
                Forms\Components\Section::make('Entregáveis Solicitados')
                    ->schema([

                        Forms\Components\KeyValue::make('entregavel')
                            ->label('Entregáveis')
                            ->columnSpanFull()
                            ->addable(false)
                            ->deletable(false),
                    ]),
                Forms\Components\Section::make('Dados da sua proposta')
                    ->schema([
                        Forms\Components\RichEditor::make('descricao')
                            ->label('Descrição')
                            ->helperText('Descreva as condições de sua proposta, como valores, condições etc')
                           ,

                        Forms\Components\Select::make('status')
                            ->options([
                                'aguardando análise' => 'Aguardando Análise',
                                'em analise' => 'Em análise',
                                'aguardando cliente' => 'Aguardando cliente',
                                'cancelado' => 'Cancelado',
                                'aceito' => 'Aceito',
                                'concluido' => 'Concluído',
                            ]),
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
                Tables\Columns\TextColumn::make('nome')
                    ->label('Cliente')
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
                Tables\Actions\Action::make('Gerar Contrato')
                    ->icon('heroicon-m-document-minus')
                ->action(function ($record){
                    dd($record);
                }),
                Tables\Actions\Action::make('Cancelar Pedido')
                    ->icon('heroicon-m-archive-box-x-mark')
                    ->action(function ($record){
                        $record->status = 'cancelado';
                        $record->save();
                    })

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
//            PedidoEntregavelRelationManager::class
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
