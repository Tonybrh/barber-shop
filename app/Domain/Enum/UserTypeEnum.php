<?php

namespace App\Domain\Enum;

enum UserTypeEnum: int
{
    case ADMIN = 1;
    case BARBER = 2;
    case USER = 3;
}
