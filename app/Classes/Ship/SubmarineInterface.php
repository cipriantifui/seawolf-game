<?php

interface SubmarineInterface
{
    /**
     * This function performs the dive or float action according to the received parameter
     * @param $action
     * @param null $val
     * @return int|mixed
     */
    public function floatOrDive($action, $val = null);

    /**
     * This function decrease current depth
     * @param null $val
     */
    public function float($val = null);

    /**
     * This function increase current depth
     * @param null $val
     */
    public function dive($val = null);

    /**
     * @return mixed
     */
    public function getMaxDepth();

    /**
     * @param mixed $maxDepth
     */
    public function setMaxDepth($maxDepth);

    /**
     * @return mixed
     */
    public function getCurrentDepth();

    /**
     * @param mixed $currentDepth
     */
    public function setCurrentDepth($currentDepth);

    /**
     * @return mixed
     */
    public function getAttackTypes();

    /**
     * @param mixed $attackTypes
     */
    public function setAttackTypes($attackTypes);
}
