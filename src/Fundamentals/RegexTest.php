<?php

namespace Fundamentals;

class RegexTest
{
    /**
     * ********************************************************************************************************
     * Buatlah fungsi untuk mengconvert nomor hp menjadi berawalan kode negara.
     * 1. Input:
     *   a. 08123456789
     *   b. +628123456789
     *   c. 628123456789
     * 2. Output: (+62) 8123456789
     * ********************************************************************************************************
     */

    /**
     * Define default country code
     * @var int
     */
    const DEFAULT_COUNTRY_CODE = 62;

    /**
     * Phone number converter
     *
     * @param string $number
     * @param int $code
     * @return string
     */
    public function run(string $number, $code = self::DEFAULT_COUNTRY_CODE): string
    {
//        $number = ltrim($number, ['+', '0']);
        if (substr($number, 0, 2) != $code) {
            $number = $code . $number;
        }

        // Format nomor (+62) 8123456789
        return '(+' . substr($number, 0, 2) . ') ' . substr($number, 2);
    }

}

$regex = new RegexTest();
$numberFormat = $regex->run('+628123456789');
print_r($numberFormat);
