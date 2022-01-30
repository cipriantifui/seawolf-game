<?php

class SubmarineBuilder implements SubmarineBuilderInterface
{
    private $ship;
    private $attackTypes;

    public function __construct(WeaponBuilderInterface $attackTypes)
    {
        $this->reset();
        $this->attackTypes = $attackTypes;
    }

    private function reset(): void
    {
        $this->ship = new Submarine();
    }

    public function buildNautilusSubmarine():void
    {
        $this->attackTypes->buildClassCTorpedo();
        $attack = $this->attackTypes->getWeapon();

        $this->ship->setName('USS Nautilus');
        $this->ship->setModelName('Ohio');
        $this->ship->setSpeed(100);
        $this->ship->setDamage(0);
        $this->ship->setMaxDepth(300);
        $this->ship->setWeight(1700);
        $this->ship->setCoordinates("42°40'01.2'N 175°35'22.4'W");
        $this->ship->setCurrentDepth(0);
        $this->ship->setAttackTypes($attack);
    }

    public function buildEnemySubmarine1():void
    {
        $this->attackTypes->buildClassATorpedo();
        $attack = $this->attackTypes->getWeapon();

        $this->ship->setName('SeaWolf1');
        $this->ship->setModelName('TR-1700');
        $this->ship->setSpeed(100);
        $this->ship->setDamage(0);
        $this->ship->setMaxDepth(800);
        $this->ship->setWeight(1700);
        $this->ship->setCoordinates("42°40'01.2'N 175°35'22.4'W");
        $this->ship->setCurrentDepth(rand(100, 300));
        $this->ship->setAttackTypes($attack);
    }

    public function buildEnemySubmarine2():void
    {
        $this->attackTypes->buildClassBTorpedo();
        $attack = $this->attackTypes->getWeapon();

        $this->ship->setName('SeaWolf2');
        $this->ship->setModelName('Dolphin-2');
        $this->ship->setSpeed(120);
        $this->ship->setDamage(0);
        $this->ship->setMaxDepth(700);
        $this->ship->setWeight(2300);
        $this->ship->setCoordinates("42°40'05.4'N 175°35'27.3'W");
        $this->ship->setCurrentDepth(rand(50, 300));
        $this->ship->setAttackTypes($attack);
    }

    public function buildEnemySubmarine3():void
    {
        $this->attackTypes->buildClassCTorpedo();
        $attack = $this->attackTypes->getWeapon();

        $this->ship->setName('SeaWolf3');
        $this->ship->setModelName('Kobben-207');
        $this->ship->setSpeed(90);
        $this->ship->setDamage(0);
        $this->ship->setMaxDepth(1000);
        $this->ship->setWeight(2700);
        $this->ship->setCoordinates("42°40'15.9'N 175°35'47.1'W");
        $this->ship->setCurrentDepth(rand(0, 300));
        $this->ship->setAttackTypes($attack);
    }

    public function getSubmarine(): Submarine
    {
        $result = $this->ship;
        $this->reset();

        return $result;
    }

}
