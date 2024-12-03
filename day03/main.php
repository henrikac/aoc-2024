<?php

$input = file_get_contents(dirname(__FILE__) . "/input.txt");

partOne($input);

function partOne(string $input) {
    $total = 0;

    preg_match_all('/mul\(\d{1,3},\d{1,3}\)/', $input, $matches);

    foreach ($matches[0] as $match) {
        preg_match('/^mul\((?P<num1>\d{1,3}),(?P<num2>\d{1,3})\)$/', $match, $values);

        $total += (int) $values['num1'] * (int) $values['num2'];
    }

    echo "Part one: $total" . PHP_EOL;
}