<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

final class StudentStatusEnum extends Enum
{
    public const DI_HOC = 0;
    public const BO_HOC = 1;
    public const BAO_LUU = 2;

    public static function asArray(): array
    {
        return [
            self::DI_HOC => 'Đi học',
            self::BO_HOC => 'Bỏ học',
            self::BAO_LUU => 'Bảo lưu',
        ];
    }
}
