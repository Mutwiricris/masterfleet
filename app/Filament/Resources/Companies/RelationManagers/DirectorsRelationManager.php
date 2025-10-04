<?php

namespace App\Filament\Resources\Companies\RelationManagers;

use App\Filament\Resources\Directors\DirectorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class DirectorsRelationManager extends RelationManager
{
    protected static string $relationship = 'directors';

    protected static ?string $relatedResource = DirectorResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
