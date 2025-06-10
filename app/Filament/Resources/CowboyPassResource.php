<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CowboyPassResource\Pages;
use App\Models\CowboyPass;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CowboyPassResource extends Resource
{
    protected static ?string $model = CowboyPass::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Senha vendida';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('cowboy_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('pass_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('helper_id')
                    ->numeric(),
                Forms\Components\TextInput::make('representation_id')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titular.name')
                    ->label('Vaqueiro')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('helper.name')
                    ->label('Esteira')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pass.number')
                    ->label('Senha')
                    ->sortable(),

                Tables\Columns\TextColumn::make('pass.category.name')
                    ->label('Categoria')
                    ->sortable(),
                Tables\Columns\TextColumn::make('representation.name')
                    ->sortable()
                    ->label('Representação'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Criado em')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->action(function (CowboyPass $record) {
                        $pass = $record->pass;
                        $pass->category_id = null;
                        $pass->save();
                        $record->delete();
                    }),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCowboyPasses::route('/'),
            'create' => Pages\CreateCowboyPass::route('/create'),
            'edit' => Pages\EditCowboyPass::route('/{record}/edit'),
        ];
    }
}
