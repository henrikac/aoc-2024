<?php

$reports = [];

if ($fp = fopen(dirname(__FILE__) . "/input.txt", "r")) {
    while (($line = fgets($fp)) !== false) {
        $reports[] = array_map('intval', explode(" ", $line));
    }
} else {
    echo "Failed to read input" . PHP_EOL;
    exit(1);
}

partOne($reports);

function partOne(array $reports) {
    $safeReports = 0;

    foreach ($reports as $report) {
        $increasing = $report[0] < $report[1];
        $end = count($report) - 1;

        $isSafe = true;

        for ($i = 0; $i < $end; $i++) {
            $diff = $increasing ? $report[$i + 1] - $report[$i] : $report[$i] - $report[$i + 1];

            if ($diff < 1 || $diff > 3) {
                $isSafe = false;
                break;
            }
        }

        if ($isSafe) {
            $safeReports++;
        }
    }

    echo "Part one: $safeReports" . PHP_EOL;
}