<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PassResource\Pages;
use App\Models\Category;
use App\Models\Cowboy;
use App\Models\CowboyPass;
use App\Models\Pass;
use App\Models\Representation;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PassResource extends Resource
{
    protected static ?string $model = Pass::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?string $modelLabel = 'Senhas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('category_id')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->contentGrid([
                'default' => 6,
                'md' => 8,
                'lg' => 10,
            ])
            ->deferLoading()
            ->paginated([50, 100])
            ->defaultPaginationPageOption(50)
            ->columns([

                Stack::make([
                    Tables\Columns\TextColumn::make('number')
                        ->searchable()
                        ->label('Senhas')
                        ->sortable(),
                ]),

            ])

            ->filters([

            ])
            ->actions([
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    BulkAction::make('associar')
                        ->label('Comprar senhas')
                        ->form([
                            Select::make('main')
                                ->label('Vaqueiro')
                                ->preload(true)
                                ->options(Cowboy::all()->pluck('name', 'id'))
                                ->required()
                                ->searchable(),

                            Select::make('helper')
                                ->label('Esteira')
                                ->preload(true)
                                ->options(
                                    Cowboy::all()->pluck('name', 'id')
                                )
                                ->required()
                                ->searchable(),

                            Select::make('category')
                                ->label('Categoria')
                                ->preload(true)
                                ->options(
                                    Category::all()->pluck('name', 'id')
                                )
                                ->required()
                                ->searchable(),

                            Select::make('representation')
                                ->label('Representação')
                                ->preload(true)
                                ->options(
                                    Representation::all()->pluck('name', 'id')
                                )
                                ->required()
                                ->searchable(),
                        ])
                        ->action(function (Collection $records, array $data) {
                            $records->each(function (Pass $pass) use ($data) {
                                if (! $pass->category_id) {
                                    $pass->update(['category_id' => $data['category']]);
                                }
                                CowboyPass::create([
                                    'pass_id' => $pass->id,
                                    'cowboy_id' => $data['main'],
                                    'helper_id' => $data['helper'],
                                    'representation_id' => $data['representation'],
                                ]);

                            });

                            Notification::make()
                                ->title('Senhas compradas com sucesso!')
                                ->success()
                                ->send();
                        }),

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
            'index' => Pages\ListPasses::route('/'),
            'create' => Pages\CreatePass::route('/create'),
            'edit' => Pages\EditPass::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('category_id', null);
    }
}
