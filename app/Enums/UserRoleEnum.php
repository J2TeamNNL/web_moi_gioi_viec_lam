<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRoleEnum extends Enum
{
    public const SUPER_ADMIN = 0;
    public const ADMIN = 1;
    public const APPLICANT = 2;
    public const HR = 3;

    public static function getRolesForRegister(): array
    {
        return [
            'applicant' => self::APPLICANT,
            'hr'        => self::HR,
        ];
    }
}
