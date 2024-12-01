<?php

$lists = [];

if ($fp = fopen(dirname(__FILE__) . "/input.txt", "r")) {
    while (($line = fgets($fp)) !== false) {
        $columns = explode("   ", $line);

        $lists[(int) $columns[0]] = (int) $columns[1];
    }
    
    fclose($fp);
} else {
    echo "Failed to read input" . PHP_EOL;
    exit(1);
}

$keys = array_keys($lists);
$values = array_values($lists);

sort($keys);
sort($values);

$sortedLists = array_combine($keys, $values);

partOne($sortedLists);
partTwo($keys, $values);

function partOne(array $lists) {
    $totalDistance = 0;

    foreach ($lists as $key => $value) {
        if ($key < $value) {
            $totalDistance += $value - $key;
        } else {
            $totalDistance += $key - $value;
        }
    }

    echo "Part one: $totalDistance" . PHP_EOL;
}

function partTwo(array $keys, array $values) {
    $result = 0;
    $i = 0;
    $end = count($values);

    foreach ($keys as $key) {
        $counter = 0;

        for (; $i < $end; $i++) {
            if ($values[$i] > $key) break;

            if ($values[$i] === $key) {
                $counter++;
            }
        }

        if ($counter > 0) {
            $result += $key * $counter;
        }
    }

    echo "Part two: $result" . PHP_EOL;
}
