<?php

use PHPUnit\Framework\TestCase;

final class BattleTest extends TestCase
{
    public function testIfPlayerEndEnemiesIsInitiate()
    {
        $battle = new Battle(new SubmarineBuilder(new WeaponBuilder()));
        $battle->initBattle();

        $player = $battle->getPlayer();
        $this->assertInstanceOf(Submarine::class, $player);
        $this->assertStringContainsString('USS Nautilus', $player->getName());

        $enemies = $battle->getEnemyPlayers();
        $this->assertIsArray($enemies);
        $this->assertInstanceOf(Submarine::class, $enemies[0]);

        $this->assertStringContainsString('Your sonar operator detects 3 enemies', $battle->getActionLog());
    }

    public function testIfBattleMayHaveMoreAttacksThanOpponents()
    {
        $battle = new Battle(new SubmarineBuilder(new WeaponBuilder()));
        $battle->initBattle();
        $battle->setNrOfAttacks(4);
        $battle->initiateDefenceAction('float');

        $this->assertStringContainsString('The battle is finish.', $battle->getActionLog());
    }

    public function testIfAttackIsAvoided()
    {
        $battle = new Battle(new SubmarineBuilder(new WeaponBuilder()));
        $battle->initBattle();

        $battle->getPlayer()->setCurrentDepth(100);

        $enemy = $battle->getEnemyPlayers()[0];
        $enemy->setCurrentDepth(100);
        $enemyAttack = $enemy->getAttackTypes();

        $battle->determineIfAttackIsAvoided($enemy, 10, 10, 'float', 10, $enemyAttack, 'W');

        $battle->getPlayer()->setCurrentDepth(90);

        $enemy = $battle->getEnemyPlayers()[0];
        $enemy->setCurrentDepth(100);
        $enemyAttack = $enemy->getAttackTypes();

        $battle->determineIfAttackIsAvoided($enemy, 10, 10, 'float', 10, $enemyAttack, 'W');

        $this->assertStringContainsString('Incorrect :(', $battle->getActionLog());

        $battle->getPlayer()->setCurrentDepth(80);

        $enemy = $battle->getEnemyPlayers()[0];
        $enemy->setCurrentDepth(100);
        $enemyAttack = $enemy->getAttackTypes();

        $battle->determineIfAttackIsAvoided($enemy, 10, 10, 'float', 10, $enemyAttack, 'W');
        $this->assertStringContainsString('Correct !', $battle->getActionLog());
    }

    public function testIfAttacksWereAvoided()
    {
        $battle = new Battle(new SubmarineBuilder(new WeaponBuilder()));
        $battle->initBattle();

        $battle->getPlayer()->setCurrentDepth(100);

        $enemy = $battle->getEnemyPlayers()[0];
        $enemy->setCurrentDepth(100);
        $enemyAttack = $enemy->getAttackTypes();

        $battle->determineIfAttackIsAvoided($enemy, 10, 10, 'float', 10, $enemyAttack, 'W');
        $this->assertStringContainsString('Capitan the game is lost', $battle->getGameEndInfos());
    }
}