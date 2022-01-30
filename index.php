<?php

require 'vendor/autoload.php';

$isRunningFromBrowser = !isset($GLOBALS['argv']);
if($isRunningFromBrowser) {
    die('No browser access.');
}

$battle = new Battle(new SubmarineBuilder(new WeaponBuilder()));
$battle->initBattle();

print($battle->getActionLog());

$input = readline('Enter the first action (ex: dive 100): ');
list($action, $val) = count(explode(' ', $input)) < 2 ? ['', ''] : explode(' ', $input);

if(strtolower($action) !== 'dive' || isset($val) && is_numeric($val) == false) {
    exit('Wrong command!!!. Note: the only action can be is dive with val (ex: dive 100).' . PHP_EOL . PHP_EOL);
}

$battle->startBattle($action, $val);

print($battle->getActionLog());

for($i = 0; $i < $battle->getNumberOfAttacks(); $i++) {

    print($battle->getInfoAttack());

    if(strtolower($action) !== 'dive' && strtolower($action) !== 'float') {
        exit('Wrong command!!!. Note: the only actions can be to float or dive.' . PHP_EOL . PHP_EOL);
    }
    $action = readline('Input your action (dive or float): ');

    $battle->initiateDefenceAction($action);

    print($battle->getActionLog());
}

print($battle->getGameEndInfos());