<?php

namespace App\Filament\Resources\Directors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DirectorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('company_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
