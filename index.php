<?php

require 'vendor/autoload.php';

$isRunningFromBrowser = !isset($GLOBALS['argv']);
if($isRunningFromBrowser) {
    die('No browser access.');
}

$battle = new Battle(new SubmarineBuilder(new WeaponBuilder()));
$battle->initBattle();

colorLog($battle->getActionLog(), 'i');

$input = readline('Enter the first action (ex: dive 100): ');
list($action, $val) = count(explode(' ', $input)) < 2 ? ['', ''] : explode(' ', $input);

if(strtolower($action) !== 'dive' || isset($val) && is_numeric($val) == false) {
    colorLog('Wrong command!!!. Note: the only action can be is dive with val (ex: dive 100).' . PHP_EOL . PHP_EOL, 'e');
    exit();
}

$battle->startBattle($action, $val);

colorLog($battle->getActionLog(), 's');

for($i = 0; $i < $battle->getNumberOfAttacks(); $i++) {

    colorLog($battle->getInfoAttack(), 'i');

    if(strtolower($action) !== 'dive' && strtolower($action) !== 'float') {
        colorLog('Wrong command!!!. Note: the only actions can be to float or dive.' . PHP_EOL . PHP_EOL, 'e');
    }
    $action = readline('Input your action (dive or float): ');

    $isSuccessfullyDefence = $battle->initiateDefenceAction($action);
    colorLog($battle->getActionLog(), $isSuccessfullyDefence ? 's' : 'w');
}

colorLog($battle->getGameEndInfos(), 'i');