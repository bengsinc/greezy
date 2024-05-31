<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\EntregaveisPedidoResource\RelationManagers\PedidoEntregavelRelationManager;
use App\Filament\App\Resources\PedidoResource\RelationManagers\EntregaveisRelationManager;
use App\Filament\Resources\PedidoResource\Pages;
use App\Filament\Resources\PedidoResource\RelationManagers;
use App\Models\Pedido;
use App\Models\PedidoEntregavel;
use App\Models\Servico;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
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
                Forms\Components\Section::make('Informações do Pedido')
                    ->schema([

                        Forms\Components\ViewField::make('rating')
                            ->viewData([
                                'id' => '',
                            ])
                            ->view('filament.linkpedido'),

                        Forms\Components\TextInput::make('numero')
                            ->label('Número do pedido')
                            ->maxLength(255)
                            ->disabled(),


                        Forms\Components\Textarea::make('observacao')
                            ->label('Observação do cliente')
                            ->disabled(),

                        Forms\Components\TextInput::make('orcamento')
                            ->label('Orçamento')
                            ->maxLength(255)
                            ->disabled()
                            ->columnSpan(1),



                        // Outros campos relacionados às informações de pagamento
                    ]),

                Forms\Components\Section::make('Serviços Selecionados')
                    ->schema([
                        Forms\Components\CheckboxList::make('servicos_selecionados')
                        ->options(function ($record){
//                            dd($record->servicos_selecionados);
                            return Servico::query()->whereIn('id', $record->servicos_selecionados)->pluck('nome', 'id');
                        })
                        ->disabled()

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
                        Forms\Components\TextInput::make('empresa')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('segmento')
                            ->maxLength(255),
                        // Outros campos relacionados ao solicitante
                    ]),
//                Forms\Components\Section::make('Entregáveis Solicitados')
//                    ->schema([
//
//                        Forms\Components\KeyValue::make('entregavel')
//                            ->label('Entregáveis')
//                            ->columnSpanFull()
//                            ->addable(false)
//                            ->deletable(false),
//                    ]),
                Forms\Components\Section::make('Dados da sua proposta')
                    ->schema([
                        Forms\Components\RichEditor::make('descricao')
                            ->label('Descrição')
                            ->helperText('Descreva as condições de sua proposta, como valores, condições etc')
                           ,
                        Forms\Components\TextInput::make('investimento')
                            ->label('Valor do investimento')
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('forma_pagamento')
                            ->label('Forma de pagamento')
                            ->maxLength(255)
                            ->columnSpan(1),

                        Forms\Components\Select::make('periodo_pagamento')
                            ->label('Periodicidade do pagamento')
                            ->live()
                            ->options([
                                'pagamento_unico' => 'Pagamento Unico',
                                'mensal' => 'Mensal',
                                'semestral' => 'Semestral',
                                'anual' => 'Anual',
                                'parcelado' => 'Parcelado',
                            ]),

                        Forms\Components\TextInput::make('numero_parcelas')
                            ->label('Número de parcelas')
                            ->maxLength(255)
                            ->visible(function (Get $get) {
                                if (in_array($get('periodo_pagamento'), ['parcelado',])) {
                                    return true;
                                }
                            })
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('duracao_projeto')
                            ->label('Duração do projeto')
                            ->maxLength(255)
                            ->columnSpan(1),

                        Forms\Components\Select::make('status')
                            ->options([
                                'aguardando análise' => 'Aguardando Análise',
//                                'em analise' => 'Em análise',
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
             EntregaveisRelationManager::class
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
