<?php

class HiddenItemGame
{
    private $grid;
    private $startX = 1;
    private $startY = 4; 

    public function __construct()
    {
        $this->grid = [
            ['#', '#', '#', '#', '#', '#', '#', '#'],
            ['#', '.', '.', '.', '.', '.', '.', '#'],
            ['#', '.', '#', '#', '#', '.', '.', '#'],
            ['#', '.', '.', '.', '#', '.', '#', '#'],
            ['#', 'X', '#', '.', '.', '.', '.', '#'],
            ['#', '#', '#', '#', '#', '#', '#', '#'],
        ];
    }

    public function findProbableLocations($stepsA, $stepsB, $stepsC)
    {
        $locations = [];

        $targetY = $this->startY - $stepsA + $stepsC;
        $targetX = $this->startX + $stepsB;

        if (isset($this->grid[$targetY][$targetX]) && $this->grid[$targetY][$targetX] === '.') {
            $locations[] = ['y' => $targetY, 'x' => $targetX];
        }

        return $locations;
    }

    public function displayGrid($foundLocations = [])
    {
        echo "Grid Layout:\n";
        foreach ($this->grid as $y => $row) {
            foreach ($row as $x => $char) {
                $isItem = false;
                foreach ($foundLocations as $loc) {
                    if ($loc['y'] === $y && $loc['x'] === $x) {
                        $isItem = true;
                        break;
                    }
                }

                if ($isItem) {
                    echo "$ ";
                } else {
                    echo $char . " ";
                }
            }
            echo "\n";
        }
    }
}

$game = new HiddenItemGame();

$stepsA = 3;
$stepsB = 4;
$stepsC = 1;

$results = $game->findProbableLocations($stepsA, $stepsB, $stepsC);

echo "Navigasi: North $stepsA, East $stepsB, South $stepsC\n";
echo "------------------------------------------\n";

if (!empty($results)) {
    echo "Probable Item Location found at:\n";
    foreach ($results as $pos) {
        echo "- Baris: " . ($pos['y'] + 1) . ", Kolom: " . ($pos['x'] + 1) . " (Array Index: [{$pos['y']}][{$pos['x']}])\n";
    }
} else {
    echo "Item tidak ditemukan atau koordinat menabrak obstacle/keluar grid.\n";
}

echo "------------------------------------------\n";
$game->displayGrid($results);
