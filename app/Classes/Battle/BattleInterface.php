<?php

interface BattleInterface
{
    /**
     * This function initiate the battle
     */
    public function initBattle();

    /**
     * This function start battle, and records the player's first action
     * @param $action
     * @param $input
     */
    public function startBattle($action, $input);

    /**
     * This function checks the defensive actions taken by the player
     * @param $action
     */
    public function initiateDefenceAction($action);

    /**
     * Returns info attack log
     * @return string
     */
    public function getInfoAttack();

    /**
     * Returns number of attacks
     * @return int
     */
    public function getNumberOfAttacks();

    /**
     * Returns end game info logs
     * @return string
     */
    public function getGameEndInfos();

    /**
     * Returns actions log
     * @return mixed
     */
    public function getActionLog();
}
