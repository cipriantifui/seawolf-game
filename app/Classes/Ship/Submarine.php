<?php

class Submarine extends Ship implements SubmarineInterface
{
    private $maxDepth;
    private $currentDepth;
    private $attackTypes;

    /**
     * This function performs the dive or float action according to the received parameter
     * @param $action
     * @param null $val
     * @return int|mixed
     */
    public function floatOrDive($action, $val = null)
    {
        if($action === 'dive') {
            return $this->dive($val);
        } else {
            return $this->float($val);
        }
    }

    /**
     * This function decrease current depth
     * @param null $val
     */
    public function float($val = null)
    {
        $val = $val === null ? rand(1, 45) : $val;
        $this->currentDepth = $this->currentDepth - $val < 0 ? 0 : $this->currentDepth - $val;

        return $val;
    }

    /**
     * This function increase current depth
     * @param null $val
     */
    public function dive($val = null)
    {
        $val = $val === null ? rand(5, 75) : $val;
        $this->currentDepth = $this->currentDepth + $val > $this->maxDepth ? $this->maxDepth : $this->currentDepth + $val;

        return $val;
    }

    /**
     * @return mixed
     */
    public function getMaxDepth()
    {
        return $this->maxDepth;
    }

    /**
     * @param mixed $maxDepth
     */
    public function setMaxDepth($maxDepth): void
    {
        $this->maxDepth = $maxDepth;
    }

    /**
     * @return mixed
     */
    public function getCurrentDepth()
    {
        return $this->currentDepth;
    }

    /**
     * @param mixed $currentDepth
     */
    public function setCurrentDepth($currentDepth): void
    {
        $this->currentDepth = $currentDepth;
    }

    /**
     * @return mixed
     */
    public function getAttackTypes()
    {
        return $this->attackTypes;
    }

    /**
     * @param mixed $attackTypes
     */
    public function setAttackTypes($attackTypes): void
    {
        $this->attackTypes = $attackTypes;
    }
}
