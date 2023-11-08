<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\ConfigResource\Pages;
use App\Filament\App\Resources\ConfigResource\RelationManagers;
use App\Models\Config;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConfigResource extends Resource
{
    protected static ?string $model = Config::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->columnSpanFull()
                    ->label('Nome da empresa'),

                Forms\Components\RichEditor::make('descricao')
                    ->columnSpanFull()
                    ->label('Descrição da empresa'),

                Forms\Components\FileUpload::make('logo')
                ->label('Logo da empresa em formato png com fundo transparente (máximo 2MB)')
                    ->openable(true)
                    ->columnSpanFull()
                    ->directory('logos')
                    ->previewable(true),

                Forms\Components\ColorPicker::make('cor_primaria')
                ->label('selecione a cor principal de sua marca'),

                Forms\Components\ColorPicker::make('cor_secundaria')
                    ->label('selecione a cor secundária de sua marca'),


                Forms\Components\TextInput::make('telefone')
                    ->label('Telefone da empresa'),

                Forms\Components\TextInput::make('email')
                    ->label('Email da empresa'),

                Forms\Components\TextInput::make('whatsapp')
                    ->columnSpanFull()
                    ->label('Link do WhatsApp da empresa'),

                Forms\Components\TextInput::make('instagram')
                    ->columnSpanFull()
                    ->label('Link do Instagram da empresa'),

                Forms\Components\TextInput::make('facebook')
                    ->columnSpanFull()
                    ->label('Link do Facebook da empresa'),

                Forms\Components\TextInput::make('site')
                    ->columnSpanFull()
                    ->label('Link do Site da empresa'),

                Forms\Components\Textarea::make('endereco')
                    ->columnSpanFull()
                    ->label('Endereço da empresa'),

                Forms\Components\FileUpload::make('logos_clientes')
                    ->label('Selecione as logos dos principais clientes')
                    ->openable(true)
                    ->columnSpanFull()
                    ->multiple(true)
                    ->directory('clientes')
                    ->previewable(true),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                ->label('Nome da empresa'),
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
            'index' => Pages\ListConfigs::route('/'),
            'create' => Pages\CreateConfig::route('/create'),
            'edit' => Pages\EditConfig::route('/{record}/edit'),
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
