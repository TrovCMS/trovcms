<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Resources\Pages\EditRecord;
use Trov\Concerns\HasCustomEditActions;

class EditPage extends EditRecord
{
    use HasCustomEditActions;

    protected static string $resource = PageResource::class;
}
