<?php

interface SubmarineBuilderInterface
{
    public function buildNautilusSubmarine():void;
    public function buildEnemySubmarine1():void;
    public function buildEnemySubmarine2():void;
    public function buildEnemySubmarine3():void;
    public function getSubmarine(): Submarine;

}
