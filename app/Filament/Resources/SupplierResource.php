<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;



use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->disk('phones')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('storage_capacity')->label('Storage Capacity in GB')
                    ->required()
                    ->numeric()
                    ->maxLength(255),

                Select::make('category_id')->options(function (): array {
                    return Category::all()->pluck('name', 'id')->all();
                })->native(false)
                    ->beforeStateDehydrated(function ($state) {
                        return $state;
                    })->label('Brand Name')->searchable(),
                TextInput::make('color'),
                TextInput::make('storage_capacity'),
                TextInput::make('released_year'),
                TextInput::make('camera_quality'),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')->disk('phones'),
                Tables\Columns\TextColumn::make('price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('category.name')->label('Brand'),
                TextColumn::make('color'),
                TextColumn::make('storage_capacity'),
                TextColumn::make('released_year'),
                TextColumn::make('camera_quality'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('Buy product')
                    ->form([
                        TextInput::make('quantity'),
                        TextInput::make('promotion')->numeric(),
                        TextInput::make('price')->numeric()

                    ])
                    ->action(function (array $data, Supplier $record): void {
                        $name  = $record->name;

                        $existing_product  = Product::where('name', $name)->first();
                        if (is_null($existing_product)) {
                            $product = new Product();
                            $product->promotion = $data['promotion'];
                            $product->image = $record->image;
                            $product->name = $record->name;
                            $product->price = $data['price'];
                            $product->category_id = $record->id;
                            $product->storage_capacity = $record->storage_capacity;
                            $product->quantity = $data['quantity'];
                            $product->supplier_id = $record->id;

                            $product->save();
                            $product->addingExpense($record->price);
                        } else {
                            $existing_product->promotion = $data['promotion'];
                            $existing_product->price = $data['price'];

                            $existing_product->quantity += $data['quantity'];
                            $existing_product->update();
                            $existing_product->addingExpense($record->price);
                        }
                    })

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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
