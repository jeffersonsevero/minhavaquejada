<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CowboyPassResource\Pages;
use App\Models\CowboyPass;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CowboyPassResource extends Resource
{
    protected static ?string $model = CowboyPass::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

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
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('pass.category.name')
                    ->label('Categoria')
                    ->sortable(),

                Tables\Columns\TextColumn::make('pass.price')
                    ->label('Preço')
                    ->money('BRL')
                    ->sortable(),

                Tables\Columns\TextColumn::make('representation.name')
                    ->sortable()
                    ->label('Representação'),

                Tables\Columns\TextColumn::make('horse')
                    ->label('Cavalo'),

                Tables\Columns\TextColumn::make('created_at')
                    ->date('d/m/Y H:i')
                    ->label('Criado em')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('representation')
                    ->relationship('representation', 'name')
                    ->label('Representação'),
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

                Action::make('pdf')
                    ->label('Imprimir')
                    ->color('success')
                    ->icon('heroicon-o-printer')
                    ->action(function (CowboyPass $record) {

                        $record->load([
                            'titular',
                            'helper',
                            'pass',
                            'representation',
                        ]);

                        $pdf = Pdf::loadView('pdf.pass', compact('record'))
                            ->setPaper('a4');

                        return response()
                            ->streamDownload(function () use ($pdf) {
                                echo $pdf->output();
                            }, 'senha_'.$record->pass->number.'.pdf');

                    }),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->action(function (Collection $records) {

                            $records->each(function (CowboyPass $cowboyPass) {
                                $cowboyPass->pass->category_id = null;
                                $cowboyPass->pass->save();
                                $cowboyPass->delete();
                            });

                        })
                        ->successNotification(Notification::make('Senhas apagadas com sucesso')->success()),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCowboyPasses::route('/'),
            'create' => Pages\CreateCowboyPass::route('/create'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderBy('created_at', 'desc');
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
