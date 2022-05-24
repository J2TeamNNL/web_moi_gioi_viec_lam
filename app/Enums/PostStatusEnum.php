<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PostStatusEnum extends Enum
{
    public const PENDING = 0;
    public const ADMIN_PENDING = 1;
    public const ADMIN_APPROVED = 2;
}
