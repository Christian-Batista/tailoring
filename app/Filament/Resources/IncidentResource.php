<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Incident;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\IncidentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Utilities\ResourceUtility;
use App\Filament\Resources\IncidentResource\RelationManagers;
use App\Filament\Resources\IncidentResource\FormSections\FormTypes;
use App\Filament\Resources\IncidentResource\FormSections\StatusForm;
use App\Filament\Resources\IncidentResource\FormSections\ConfigurationForm;

class IncidentResource extends Resource
{
    protected static ?string $model = Incident::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Configuracion')
                        ->schema([
                            ConfigurationForm::make(),
                        ]),
                        Tab::make('Formularios de la incidencia')
                        ->schema([
                            FormTypes::make(),
                        ]),
                        Tab::make('Estados de la incidencia')
                        ->schema([
                            StatusForm::make(),
                        ])
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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

    public static function getNavigationGroup(): ?string
    {
        return ResourceUtility::getResourceProperty('Incident', 'group');
    }


    public static function getNavigationLabel(): string
    {
        return ResourceUtility::getResourceProperty('Incident', 'label');
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
            'index' => Pages\ListIncidents::route('/'),
            'create' => Pages\CreateIncident::route('/create'),
            'edit' => Pages\EditIncident::route('/{record}/edit'),
        ];
    }
}
