<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([ 
                Forms\Components\Section::make('Informacion basica del empleado')
                    ->schema([
                    Grid::make()
                    ->schema([
                        // Nombre del empleado
                        Forms\Components\TextInput::make('user.name')
                        ->label('Nombre del empleado')
                        ->required()
                        ->prefixIcon('heroicon-o-user')
                        ->prefixIconColor('primary'),

                        // Correo del empleado
                        Forms\Components\TextInput::make('user.email')
                        ->label('Correo del empleado')
                        ->prefixIcon('heroicon-s-envelope-open')
                        ->prefixIconColor('primary')
                        ->required()
                        ->email(),

                        // Cedula del empleado
                        Forms\Components\TextInput::make('id_number')
                        ->label('Cedula del empleado')
                        ->prefixIcon('heroicon-o-identification')
                        ->prefixIconColor('primary')
                        ->required()
                        ->maxLength(15),

                        // Password del empleado
                        Forms\Components\TextInput::make('user.password')
                        ->label('Password del empleado')
                        ->required()
                        ->prefixIcon('heroicon-s-lock-open')
                        ->prefixIconColor('primary')
                        ->password()
                    ])->columns(2),
                    ]),
                // Informacion de contacto del empleado
                Forms\Components\Section::make('Informacion de contacto del empleado')
                    ->schema([
                    Grid::make()
                    ->schema([
                        // Telefono del empleado
                    Forms\Components\TextInput::make('phone_number')
                    ->label('Telefono del empleado')
                    ->required()
                    ->maxLength(15)
                    ->prefixIcon('heroicon-o-phone')
                    ->prefixIconColor('primary'),

                     // Direccion del empleado
                     Forms\Components\TextInput::make('address')
                     ->label('Direccion del empleado')
                     ->required()
                     ->prefixIcon('heroicon-o-map-pin')
                     ->prefixIconColor('primary'),
                    ])->columns(2),

                    Forms\Components\Section::make()
                    ->description('Informacion de contacto de emergencia del empleado')
                    ->schema([
                        Forms\Components\TextInput::make('emergency_contact.name')
                        ->label('Nombre del contacto de emergencia')
                        ->prefixIcon('heroicon-s-fire')
                        ->prefixIconColor('primary')
                        ->required(),

                        Forms\Components\TextInput::make('emergency_contact.phone_number')
                        ->label('Telefono del contacto de emergencia')
                        ->required()
                        ->maxLength(15)
                        ->prefixIcon('heroicon-o-phone')
                        ->prefixIconColor('primary'),
                    ])->columns(2),

                    Forms\Components\Section::make()
                    ->description('Configuraciones del empleado')
                    ->schema([
                        Forms\Components\Select::make('user.roles')
                        ->label('Rol de usuario')
                            //->relationship('user.roles', 'name')
                            ->options(Role::all()->pluck('name', 'id'))
                            ->columnSpan(6), // Ocupa menos espacio en la cuadrícula
                    ]),

                    Forms\Components\Section::make()
                    ->description('Subir foto de perfil')
                    ->schema([
                        Forms\Components\FileUpload::make('photo')
                            ->label('Foto del empleado')
                            ->image()
                            ->directory('images/employees')
                            ->preserveFilenames()
                            ->imageEditor()
                            ->hintIcon('heroicon-m-photo')
                            ->hintColor('primary')
                    ])
                ])
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Foto del empleado
                Tables\Columns\ImageColumn::make('photo')
                ->getStateUsing(function ($record) { return asset('storage/' . $record->photo); })
                ->square(),

                Tables\Columns\TextColumn::make('user.name')
                ->label('Nombre del empleado'),
                Tables\Columns\TextColumn::make('user.email')
                ->label('Correo del empleado'),
                Tables\Columns\TextColumn::make('id_number')->label('Cedula'),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
