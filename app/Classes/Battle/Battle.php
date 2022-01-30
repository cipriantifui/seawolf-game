<?php

class Battle implements BattleInterface
{
    private $player;
    private $enemyPlayers;
    private $submarineBuilder;
    private $nrOfAttacks;
    private $isLastAttackSuccessful = false;
    private $successfulyAttack = 0;
    private $attackLog;
    private $actionLog;

    public function __construct(SubmarineBuilderInterface $submarineBuilder)
    {
        $this->submarineBuilder = $submarineBuilder;
    }

    /**
     * This function initiate the battle
     */
    public function initBattle()
    {
        $this->nrOfAttacks = 0;

        $this->submarineBuilder->buildNautilusSubmarine();
        $this->player = $this->submarineBuilder->getSubmarine();

        $this->enemyPlayers = [];
        $this->submarineBuilder->buildEnemySubmarine1();
        $this->enemyPlayers[] = $this->submarineBuilder->getSubmarine();

        $this->submarineBuilder->buildEnemySubmarine2();
        $this->enemyPlayers[] = $this->submarineBuilder->getSubmarine();

        $this->submarineBuilder->buildEnemySubmarine3();
        $this->enemyPlayers[] = $this->submarineBuilder->getSubmarine();

        $this->actionLog = 'Your sonar operator detects 3 enemies submarines coming at you from different directions.' .PHP_EOL;
    }

    /**
     * This function start battle, and records the player's first action
     * @param $action
     * @param $input
     */
    public function startBattle($action, $input)
    {
        $this->player->floatOrDive($action, $input);
        $this->actionLog = 'The ' . $this->player->getName() . ' dive at '. $this->player->getCurrentDepth().'m' . PHP_EOL . PHP_EOL;
    }

    /**
     * This function checks the defensive actions taken by the player
     * @param $action
     */
    public function initiateDefenceAction($action)
    {
        if($this->nrOfAttacks >= count($this->enemyPlayers)) {
            $this->log .= 'The battle is finish.';
        }

        $enemy = $this->enemyPlayers[$this->nrOfAttacks];
        $enemyAttack = $enemy->getAttackTypes();
        $damage = $this->isLastAttackSuccessful ? $enemyAttack->getDamage() * 2 : $enemyAttack->getDamage();
        $range = $enemyAttack->getRange();

        $val = $this->player->floatOrDive($action);

        if($this->player->getCurrentDepth() >= $enemy->getCurrentDepth() - $range && $this->player->getCurrentDepth() <= $enemy->getCurrentDepth() + $range) {
            $this->player->setDamage($damage);
            $this->actionLog = 'Incorrect :( You’ve taken '.$damage.' damage points, '. ($action === "dive" ? "diving" : "floating"). ' ' . $val.'m.' . PHP_EOL . PHP_EOL;
            $this->attackLog .= 'The ' . $enemyAttack->getClassName() .' attack received from the west launched by the ' . $enemy->getName() . ' that caused ' . $damage . ' damage.' . PHP_EOL;
            $this->isLastAttackSuccessful = true;
            $this->successfulyAttack++;
        } else {
            $this->actionLog = 'Correct ! You dodged the hit, ' . ($action === "dive" ? "diving" : "floating"). ' ' .$val.'m.' . PHP_EOL . PHP_EOL;
            $this->isLastAttackSuccessful = false;
        }

        $this->nrOfAttacks++;
    }

    /**
     * Returns info attack log
     * @return string
     */
    public function getInfoAttack()
    {
        $enemy = $this->enemyPlayers[$this->nrOfAttacks];
        $enemyAttack = $enemy->getAttackTypes();

        $numberToWords = new \NumberToWords\NumberToWords();
        $numberToWords = $numberToWords->getNumberTransformer('en');
        $attackNumberTxt = $numberToWords->toWords($this->nrOfAttacks + 1);

        return 'The number ' . $attackNumberTxt . ' attack!' . PHP_EOL .'You are being hit from the East with a ' . $enemyAttack->getClassName() . ', what is your action, Captain ?' . PHP_EOL;
    }

    /**
     * Returns number of attacks
     * @return int
     */
    public function getNumberOfAttacks()
    {
        return count($this->enemyPlayers);
    }

    /**
     * Returns end game info logs
     * @return string
     */
    public function getGameEndInfos()
    {
        if($this->successfulyAttack > 0) {
            $infoText = 'Capitan the game is lost, ' . $this->successfulyAttack . ' of the enemy attacks were successful' . PHP_EOL;
            $infoText.= $this->attackLog;
            $infoText.= 'Your submarine, ' . $this->player->getName() . ' received a total of ' . $this->player->getDamage() . ' damage and is at a depth of ' . $this->player->getCurrentDepth() . 'm.' . PHP_EOL . PHP_EOL;
        } else {
            $infoText = 'Capitan the game is won, you managed to avoid all the attacks.' . PHP_EOL;
            $infoText.= 'Your submarine, ' . $this->player->getName() . ' is at a depth of ' . $this->player->getCurrentDepth() . 'm.' . PHP_EOL . PHP_EOL;
        }

        return $infoText;
    }

    /**
     * Returns actions log
     * @return mixed
     */
    public function getActionLog()
    {
        return $this->actionLog;
    }
}
