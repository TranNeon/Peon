<?php

namespace App;

enum UserRole: string
{
    case ADMIN = 'admin';
    case REVIEWER = 'reviewer';
    case USER = 'user';
}
