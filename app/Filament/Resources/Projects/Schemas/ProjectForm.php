<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('subtitle')
                    ->label('Subtitle / one-liner')
                    ->maxLength(255)
                    ->columnSpanFull(),
                TagsInput::make('chips')
                    ->label('Tech chips')
                    ->placeholder('Add a technology and press Enter')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),
                TagsInput::make('highlights')
                    ->label('Highlights (bullet points)')
                    ->placeholder('Add a highlight and press Enter')
                    ->columnSpanFull(),
                Repeater::make('links')
                    ->label('Buttons / links')
                    ->schema([
                        TextInput::make('label')->required(),
                        TextInput::make('url')->required()->default('#'),
                        Select::make('style')
                            ->options(['primary' => 'Primary (filled)', 'ghost' => 'Ghost (outline)'])
                            ->default('ghost')
                            ->required(),
                    ])
                    ->columns(3)
                    ->reorderable()
                    ->collapsible()
                    ->defaultItems(0)
                    ->addActionLabel('Add link')
                    ->columnSpanFull(),
                Select::make('visual_variant')
                    ->label('Mockup style')
                    ->options([
                        'rose' => 'Rose',
                        'peach' => 'Peach (sidebar)',
                        'cream' => 'Cream (list)',
                        'mauve' => 'Mauve (board)',
                    ])
                    ->default('rose')
                    ->required(),
                FileUpload::make('screenshot')
                    ->label('Screenshot (optional)')
                    ->image()
                    ->disk('public')
                    ->directory('assets/uploads')
                    ->visibility('public')
                    ->helperText('Upload a real screenshot to replace the mockup graphic.')
                    ->columnSpanFull(),
            ]);
    }
}
