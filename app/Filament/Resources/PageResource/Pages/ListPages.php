<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->orderBy('front_page', 'desc')->orderBy('title', 'asc');
    }
}
