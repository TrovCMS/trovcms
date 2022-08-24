<?php

namespace App\Forms\Blocks;

use Filament\Forms\Components\Builder\Block;
use FilamentTiptapEditor\TiptapEditor;

class RichText
{
    public static function make(?string $profile = 'default'): Block
    {
        return Block::make('rich-text')
            ->schema([
                TiptapEditor::make('content')
                    ->disableLabel()
                    ->profile($profile)
                    ->required(),
            ]);
    }
}
