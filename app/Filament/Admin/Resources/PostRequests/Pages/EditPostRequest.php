<?php

namespace App\Filament\Admin\Resources\PostRequests\Pages;

use App\Filament\Admin\Resources\PostRequests\PostRequestResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPostRequest extends EditRecord
{
    protected static string $resource = PostRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
