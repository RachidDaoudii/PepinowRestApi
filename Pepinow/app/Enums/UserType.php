<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
// use BenSampo\Enum\Rules\EnumValue;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserType extends Enum
{
    const Admin = 'admin';
    const User = 'user';

    // public static function getValues():Array
    // {
    //     return  [
    //         self::Admin,
    //         self::User,
    //     ];
    // }

}



