<?php

namespace App\Filament\Resources\PacienteResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TratamientosRelationManager extends RelationManager
{
    protected static string $relationship = 'tratamientos';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Descripcion')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan('full'),
                Forms\Components\Textarea::make('Notas')
                    ->maxLength(65535)
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('Precio')
                    ->required()
                    ->prefix('$')
                    ->maxValue('2000000000000'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('descripcion')
            ->columns([
                Tables\Columns\TextColumn::make('descripcion'),
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
