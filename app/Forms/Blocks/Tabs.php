<?php

namespace App\Forms\Blocks;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

class Tabs
{
    public static function make(): Block
    {
        return Block::make('tabs')
            ->schema([
                Repeater::make('items')
                    ->disableLabel()
                    ->createItemButtonLabel('Add Tab')
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        Builder::make('content')
                            ->createItemButtonLabel('Add Content')
                            ->blocks([
                                RichText::make('simple'),
                            ]),
                    ]),
            ]);
    }
}
