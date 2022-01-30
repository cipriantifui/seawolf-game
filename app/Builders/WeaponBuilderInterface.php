<?php

interface WeaponBuilderInterface
{
    public function buildClassATorpedo(): void;
    public function buildClassBTorpedo(): void;
    public function buildClassCTorpedo(): void;
    public function getWeapon(): Weapon;

}
