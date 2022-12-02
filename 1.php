<?php
// Можно было бы использовать преведение к строке, но это более медленно. Особенно учитывая наличие JIT.
function isContainsDigit(int $number, int $digit): bool {
    while($number != 0) {
        $curr_digit = $number % 10;
        if ($curr_digit === $digit) return true;
        $number /= 10;
    }

    return false;
}

const NUMBER_FOR_INSERT = 60;
const DIGIT = 2;
$arr = [2, 0, 72, 32, 9, 39, 52, 672, 555, 693, 22];


$len = count($arr);
for($i = 0; $i < $len; $i++) {
    if(isContainsDigit($arr[$i], DIGIT)) {
        $len++;
        for ($j = $len - 1; $j > $i; $j--){
            $arr[$j] = $arr[$j - 1];
        }  
        $i++;
        $arr[$i] = NUMBER_FOR_INSERT;
    }
}

var_dump($arr);
