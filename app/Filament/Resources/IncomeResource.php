<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncomeResource\Pages;
use App\Filament\Resources\IncomeResource\RelationManagers;
use App\Models\Income;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IncomeResource extends Resource
{
    public static  ?string  $label = 'Order List';


    protected static ?string $model = Income::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('money')
                    ->required()
                    ->maxLength(255),
                Select::make('user_id')->options(function (): array {
                    return User::all()->pluck('name', 'id')->all();
                })->native(false)
                    ->beforeStateDehydrated(function ($state) {
                        return $state;
                    })->label('User Name')->searchable(),
                Select::make('product_id')->options(function (): array {
                    return Product::all()->pluck('name', 'id')->all();
                })->native(false)
                    ->beforeStateDehydrated(function ($state) {
                        return $state;
                    })->label('Product')->searchable(),
                Select::make('supplier_id')->options(function (): array {
                    return Supplier::all()->pluck('name', 'id')->all();
                })->native(false)
                    ->beforeStateDehydrated(function ($state) {
                        return $state;
                    })->label('Supplier')->searchable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('money')->label('Amount')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('Customer Name')

                    ->searchable(),
                Tables\Columns\TextColumn::make('user.address')->label('Customer Address')

                    ->searchable(),

                Tables\Columns\TextColumn::make('supplier.name')->label('Supplier')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIncomes::route('/'),
            'create' => Pages\CreateIncome::route('/create'),
            'edit' => Pages\EditIncome::route('/{record}/edit'),
        ];
    }
}
