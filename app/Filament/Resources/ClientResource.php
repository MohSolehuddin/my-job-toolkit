<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Clients Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('full_name'),
                TextInput::make('company_name'),
                TextInput::make('phone_number'),
                TextInput::make('email'),
                TextInput::make('address'),
                TextInput::make('description'),
                TextInput::make('coordinate_in_map'),
                TextInput::make('website'),
                Select::make('is_active')->options([
                    true => 'Active',
                    false => 'Inactive',
                ])->default(true),
                Select::make('is_client')->options([
                    true => 'Client',
                    false => 'Prospective Client',
                ])->default(true)->required(),
                Select::make('work_type')->options([
                    'freelancer' => 'Freelancer',
                    'full_time' => 'Full time',
                    'contract' => 'Contract',
                    'part_time' => 'Part time',
                ])->default('freelancer')->required(),
                Select::make('is_remote')->options([
                    true => 'Remote',
                    false => 'On site',
                ])->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name'),
                TextColumn::make('company_name'),
                TextColumn::make('phone_number'),
                TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
