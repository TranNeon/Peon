<?php

namespace App\Filament\Admin\Resources\PostRequests\Pages;

use App\Filament\Admin\Resources\PostRequests\PostRequestResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPostRequest extends ViewRecord
{
    protected static string $resource = PostRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
