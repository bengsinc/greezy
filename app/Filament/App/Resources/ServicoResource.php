<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\ServicoResource\Pages;
use App\Filament\App\Resources\ServicoResource\RelationManagers;
use App\Models\Servico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServicoResource extends Resource
{
    protected static ?string $model = Servico::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';
    protected static ?string $modelLabel = 'Serviço';
    protected static ?string $pluralModelLabel = 'Listar Serviços';
    protected static ?string $navigationGroup = 'Serviços';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->columnSpanFull()
                    ->label('Nome do Serviço')
                    ->required(),
                Forms\Components\RichEditor::make('descricao')
                    ->columnSpanFull()
                    ->label('Descrição do Serviço')
                    ->required(),
//                Forms\Components\FileUpload::make('imagem')
//                    ->label('Adicionar imagem (máximo 2MB)')
//                    ->openable(true)
//                    ->columnSpanFull()
//                    ->directory('servicos')
//                    ->previewable(true),
                Forms\Components\Select::make('tipo')
                    ->options([
                        'mensal' => 'Mensal',
                        'semestral' => 'Semestral',
                        'anual' => 'Anual',
                        'avulso' => 'Avulso',
                    ])
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome do Serviço'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\EntregaveisRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServicos::route('/'),
            'create' => Pages\CreateServico::route('/create'),
            'edit' => Pages\EditServico::route('/{record}/edit'),
        ];
    }
}
