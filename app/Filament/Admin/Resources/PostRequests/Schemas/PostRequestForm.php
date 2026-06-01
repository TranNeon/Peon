<?php

namespace App\Filament\Admin\Resources\PostRequests\Schemas;

use App\PostRequestStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PostRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('status')
                    ->options(PostRequestStatus::class)
                    ->default('pending')
                    ->required(),
                Textarea::make('title')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('draft_id')
                    ->required()
                    ->numeric(),
                TextInput::make('post_id')
                    ->numeric(),
                TextInput::make('user_id')
                    ->numeric(),
                TextInput::make('reviewer_id')
                    ->numeric(),
            ]);
    }
}
