<?php


class AdditionalCalculator extends Calculator
{
    function __construct()
    {
        parent::__construct();
        parent::setOperation(array('%' => 'remainder'));
    }
    
    protected function remainder($counter)
    {
        $this->answer %= $this->list_Of_Numbers[$counter];
    }
}