<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Role;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Permission;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RoleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Utilities\ResourceUtility;
use App\Filament\Resources\RoleResource\RelationManagers;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'eos-role-binding';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nombre del rol')
                    ->required(),

                //Relacionar el rol con los permisos disponibles
                Forms\Components\Select::make('permissions')
                ->relationship('permissions', 'name')
                ->label('Permisos')
                ->multiple() // Relacion con permisos
                ->options(Permission::pluck('name', 'id'))
                ->required(), // Distribucion en columnas en el formulario
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Nombre del rol'),

                // Muestra una lista de los permisos del rol
                Tables\Columns\TagsColumn::make('permissions.name')
                ->label('Permisos')
                ->limit(3) // Limita la visualización a 3 permisos
                ->toggleable() // Habilita un botón para mostrar/ocultar todos los permisos
                ->sortable()
                ->size('sm'), // Puedes ajustar el tamaño del texto si lo deseas
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label(ResourceUtility::getResourceProperty('Role', 'edit_button')),
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

    public static function getNavigationGroup(): ?string
    {
        return ResourceUtility::getResourceProperty('Role', 'group');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
