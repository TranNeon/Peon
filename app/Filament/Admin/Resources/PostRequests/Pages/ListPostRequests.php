<?php

namespace App\Filament\Admin\Resources\PostRequests\Pages;

use App\Filament\Admin\Resources\PostRequests\PostRequestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPostRequests extends ListRecords
{
    protected static string $resource = PostRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
