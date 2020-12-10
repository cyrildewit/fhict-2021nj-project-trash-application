<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SeperationTray extends Enum
{
    const PMD = 0;
    const Paper = 2;
    const GFT = 3;
    const ResidualWaste = 4;
}
