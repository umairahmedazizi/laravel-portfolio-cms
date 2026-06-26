<?php

namespace App\Filament\Resources\SkillCategories\Schemas;

use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SkillCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Category name')
                    ->required(),
                TagsInput::make('items')
                    ->label('Skills')
                    ->placeholder('Add a skill and press Enter')
                    ->columnSpanFull(),
            ]);
    }
}
