<?php

namespace App\Filament\Admin\Resources\PostRequests\Pages;

use App\Filament\Admin\Resources\PostRequests\PostRequestResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePostRequest extends CreateRecord
{
    protected static string $resource = PostRequestResource::class;
}
