<?php

namespace Fundamentals;

class OperationTest
{
    /**
     * ********************************************************************************************************
     * Buatlah sebuah program yang mencetak angka dari 1 sampai dengan 50, dengan ketentuan sebagai berikut:
     * 1. Bila angka merupakan kelipatan tiga akan mencetak kata “Foo” (tanpa tanda petik dua)
     * 2. Bila angka merupakan kelipatan lima akan mencetak “Bar”
     * 3. Bila angka merupakan kelipatan tiga dan lima kedua-duanya, maka akan mencetak “FooBar”.
     * ********************************************************************************************************
     */

    /**
     * Run your answer here
     *
     * @return array
     */
    public function run(): array
    {

        $numbers = [];
        for ($i = 1; $i <= 50; $i++) {
            $output = '';
            if ($i % 3 == 0) {
                $output .= 'Foo';
            }
            if ($i % 5 == 0) {
                $output .= 'Bar';
            }
            if ($output === '') {
                $output = $i;
            }
            $numbers[] = $output;
        }
        return $numbers;
//        return [
//            //
//        ];
    }
}

$numbers = new OperationTest();
$number = $numbers->run();
print_r($number);
