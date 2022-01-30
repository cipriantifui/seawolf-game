<?php

interface WeaponInterface
{
    /**
     * This function returns random damage
     * @return int
     */
    public function getDamage();

    /**
     * @return mixed
     */
    public function getClassName();

    /**
     * @param mixed $className
     */
    public function setClassName($className);

    /**
     * @return mixed
     */
    public function getMinDamage();

    /**
     * @param mixed $minDamage
     */
    public function setMinDamage($minDamage);

    /**
     * @return mixed
     */
    public function getMaxDamage();

    /**
     * @param mixed $maxDamage
     */
    public function setMaxDamage($maxDamage);

    /**
     * @return mixed
     */
    public function getRange();

    /**
     * @param mixed $range
     */
    public function setRange($range);
}
