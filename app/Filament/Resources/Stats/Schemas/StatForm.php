<?php

namespace App\Filament\Resources\Stats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number')
                    ->required()
                    ->helperText('e.g. 10, 600'),
                TextInput::make('suffix')
                    ->helperText('e.g. + or "stacks"'),
                TextInput::make('label')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
