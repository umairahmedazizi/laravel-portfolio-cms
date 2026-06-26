<?php

namespace App\Filament\Resources\ContactLinks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->options([
                        'email' => 'Email',
                        'phone' => 'Phone',
                        'linkedin' => 'LinkedIn',
                        'github' => 'GitHub',
                        'link' => 'Other / link',
                    ])
                    ->default('link')
                    ->required()
                    ->helperText('Controls which icon is shown.'),
                TextInput::make('label')
                    ->required()
                    ->helperText('The small caption, e.g. "Email" or "LinkedIn".'),
                TextInput::make('value')
                    ->helperText('The text shown underneath, e.g. your address or "View my repositories".'),
                TextInput::make('url')
                    ->required()
                    ->helperText('mailto:you@mail.com, tel:+92..., or https://...'),
            ]);
    }
}
