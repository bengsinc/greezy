<?php

namespace App\Filament\App\Resources\PedidoResource\RelationManagers;

use App\Models\Servico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntregaveisRelationManager extends RelationManager
{
    protected static string $relationship = 'listaentregaveis';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),

                        Forms\Components\Select::make('servico_id')
                            ->required()
                            ->columnSpanFull()
                            ->label('Selecione o serviço')
                            ->options(function (){
                                return Servico::query()->whereIn('id', $this->ownerRecord->servicos_selecionados)->pluck('nome', 'id');
                            }),

                Forms\Components\RichEditor::make('descricao')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nome')
            ->columns([
                Tables\Columns\TextColumn::make('nome'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
