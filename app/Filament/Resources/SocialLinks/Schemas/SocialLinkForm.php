<?php

namespace App\Filament\Resources\SocialLinks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SocialLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('platform')
                    ->options([
                        'email' => 'Email',
                        'linkedin' => 'LinkedIn',
                        'github' => 'GitHub',
                        'link' => 'Other / link',
                    ])
                    ->default('link')
                    ->required()
                    ->helperText('Controls which icon is shown.'),
                TextInput::make('url')
                    ->required()
                    ->helperText('mailto:you@mail.com or https://...'),
            ]);
    }
}
