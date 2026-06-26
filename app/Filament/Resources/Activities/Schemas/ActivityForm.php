<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('date_label')
                    ->label('Date label')
                    ->helperText('e.g. February 2025'),
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('org')
                    ->label('Organisation'),
                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
