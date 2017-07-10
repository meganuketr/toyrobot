<?php

require_once 'Robot.php';

const CANTCOLUMNS = 5;
const CANTROWS = 5;

$commandsArray = [
    'PLACE' => 'place',
    'MOVE' => 'move',
    'REPORT' => 'report',
    'LEFT' => 'left',
    'RIGHT' => 'right',
];

if (empty($argv[1])) die("No command file specified\n");

$commandFile = fopen($argv[1], "r") or die("Unable to open file!\n");

$robot = new Robot(CANTCOLUMNS, CANTROWS);

while(!feof($commandFile)) {
    $line = trim(fgets($commandFile));
    
    if (strpos($line, 'PLACE') !== false) {
        $params = explode(",", substr($line, 6));
        $robot->place($params[0], $params[1], $params[2]);
        
    } else if (!empty($line)) {
        if (!isset($commandsArray[$line])) {
            die($line . " Invalid command\n");
        }
        if ($line == 'REPORT') {
            echo implode(" ", $robot->getReport()) . "\n";
        } else {
            $command = $commandsArray[$line];
            $robot->$command();
        }
    }
}

fclose($commandFile);
