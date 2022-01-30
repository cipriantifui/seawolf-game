<?php

class WeaponBuilder implements WeaponBuilderInterface
{
    private $weapon;

    public function __construct()
    {
        $this->reset();
    }

    private function reset(): void
    {
        $this->weapon = new Weapon();
    }

    public function buildClassATorpedo(): void
    {
        $this->weapon->setClassName('class A torpedo');
        $this->weapon->setMinDamage(1);
        $this->weapon->setMaxDamage(5);
        $this->weapon->setRange(35);
    }

    public function buildClassBTorpedo(): void
    {
        $this->weapon->setClassName('class B torpedo');
        $this->weapon->setMinDamage(7);
        $this->weapon->setMaxDamage(14);
        $this->weapon->setRange(45);
    }

    public function buildClassCTorpedo(): void
    {
        $this->weapon->setClassName('class B torpedo');
        $this->weapon->setMinDamage(9);
        $this->weapon->setMaxDamage(22);
        $this->weapon->setRange(50);
    }

    public function getWeapon(): Weapon
    {
        $result = $this->weapon;
        $this->reset();

        return $result;
    }

}
