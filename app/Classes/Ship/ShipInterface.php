<?php

interface ShipInterface
{
    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param mixed $name
     */
    public function setName($name): void;

    /**
     * @return mixed
     */
    public function getModelName();

    /**
     * @param mixed $modelName
     */
    public function setModelName($modelName): void;

    /**
     * @return mixed
     */
    public function getSpeed();

    /**
     * @param mixed $speed
     */
    public function setSpeed($speed): void;

    /**
     * @return mixed
     */
    public function getDamage();

    /**
     * @param mixed $health
     */
    public function setDamage($health): void;

    /**
     * @return mixed
     */
    public function getWeight();

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void;

    /**
     * @return mixed
     */
    public function getCoordinates();

    /**
     * @param mixed $coordinates
     */
    public function setCoordinates($coordinates): void;

}