<?php

class Weapon implements WeaponInterface
{
    private $className;
    private $minDamage;
    private $maxDamage;
    private $range;

    /**
     * This function returns random damage
     * @return int
     */
    public function getDamage()
    {
        return rand($this->minDamage, $this->maxDamage);
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param mixed $className
     */
    public function setClassName($className): void
    {
        $this->className = $className;
    }

    /**
     * @return mixed
     */
    public function getMinDamage()
    {
        return $this->minDamage;
    }

    /**
     * @param mixed $minDamage
     */
    public function setMinDamage($minDamage): void
    {
        $this->minDamage = $minDamage;
    }

    /**
     * @return mixed
     */
    public function getMaxDamage()
    {
        return $this->maxDamage;
    }

    /**
     * @param mixed $maxDamage
     */
    public function setMaxDamage($maxDamage): void
    {
        $this->maxDamage = $maxDamage;
    }

    /**
     * @return mixed
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * @param mixed $range
     */
    public function setRange($range): void
    {
        $this->range = $range;
    }
}
