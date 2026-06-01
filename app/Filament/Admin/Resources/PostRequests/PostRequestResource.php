<?php

namespace App\Filament\Admin\Resources\PostRequests;

use App\Filament\Admin\Resources\PostRequests\Pages\CreatePostRequest;
use App\Filament\Admin\Resources\PostRequests\Pages\EditPostRequest;
use App\Filament\Admin\Resources\PostRequests\Pages\ListPostRequests;
use App\Filament\Admin\Resources\PostRequests\Pages\ViewPostRequest;
use App\Filament\Admin\Resources\PostRequests\Schemas\PostRequestForm;
use App\Filament\Admin\Resources\PostRequests\Schemas\PostRequestInfolist;
use App\Filament\Admin\Resources\PostRequests\Tables\PostRequestsTable;
use App\Models\PostRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostRequestResource extends Resource
{
    protected static ?string $model = PostRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return PostRequestForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PostRequestInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostRequestsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPostRequests::route('/'),
            'create' => CreatePostRequest::route('/create'),
            'view' => ViewPostRequest::route('/{record}'),
            'edit' => EditPostRequest::route('/{record}/edit'),
        ];
    }
}
