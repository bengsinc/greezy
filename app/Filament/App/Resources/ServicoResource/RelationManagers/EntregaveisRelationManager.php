<?php

namespace App\Filament\App\Resources\ServicoResource\RelationManagers;

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
    protected static string $relationship = 'entregaveis';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->columnSpanFull()
                    ->label('Titulo'),
                Forms\Components\RichEditor::make('descricao')
                    ->columnSpanFull()
                    ->label('Conteúdo do entregável'),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->user()->id) // Define o valor padrão como o ID do usuário autenticado
                    ->required(),

//                Forms\Components\FileUpload::make('icone')
//                    ->label('icone que representa o serviço em formato png com fundo transparente (máximo 1MB)')
//                    ->openable(true)
//                    ->columnSpanFull()
//                    ->directory('icones')
//                    ->previewable(true),

//                Forms\Components\Select::make('servico_id')
//                    ->searchable()
//                    ->label('Selecione o Serviço')
//                    ->preload()
//                    ->options(function () {
//                        return Servico::query()->where('user_id', auth()->user()->id)->get()->mapWithKeys(function ($servico) {
//                            return [$servico->id => "{$servico->nome} "];
//                        })->toArray();
//                    }),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nome')
            ->columns([
                Tables\Columns\TextColumn::make('nome'),
                Tables\Columns\TextColumn::make('status')
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
