<?php

class Calculator
{
    protected $list_Of_Numbers;
    protected $list_Of_Arifmetic_Signs;
    protected $answer;
    private $operations;


    public function __construct()
    { 
        $this->list_Of_Numbers = array();
        $this->list_Of_Arifmetic_Signs = array();
        $this->answer = NULL;
        $this->operations = array('*' => 'multiply', '/' => 'divide', '+' => 'plus', '-' => 'minus');
    }
     

    protected function setStr($str = NULL)
    {
        if(isset($str) && is_string($str) && preg_match('#^\d+|\W+$#', $str))
        {
            return $str;
                 
        } else
        {
            throw new Exception("bad argument, it must be right string");
        }
    }
    
    public function getAnswer($str)
    {
        $this->parser(explode(' ', $this->setStr($str)));
        $this->toCompute();
        
        return $this->answer;
    }
    
    
    protected function setOperation(array $operation)
    {
        $key = key($operation);
        $this->operations[$key] = $operation[$key];
    }
    
    protected function parser(array $array_Of_Signs_and_Numbers)
    {
        $this->list_Of_Numbers = $this->getNumbers($array_Of_Signs_and_Numbers);
        $this->list_Of_Arifmetic_Signs = $this->getSigns($array_Of_Signs_and_Numbers);
    }
    
    private function getSigns(array $arr_Signs)
    {
        $array_Of_Signs = array();
        foreach ($arr_Signs as $value) 
        {
            if(preg_match('#^(\W)$#', $value))
            {
                $array_Of_Signs[]= $value;
            }
        }

        return $array_Of_Signs;
    }
    
    private function getNumbers(array $arr_Numbers)
    {
        $array_Of_Numbers = array();
        foreach ($arr_Numbers as $value) 
        {
         if (preg_match('#^(-[0-9]+|[0-9]+)$#', $value) ) 
         {
             $array_Of_Numbers[]= $value;
         }
        }
        
        return $array_Of_Numbers;
    }
    
    private function toCompute()
    {
        $counter = 0;
        $this->answer = $this->list_Of_Numbers[$counter];
        
        foreach($this->list_Of_Arifmetic_Signs as $key => $value)
        {
            $this->{$this->operations[$this->list_Of_Arifmetic_Signs[$key]]}(++$counter);
        }
    }
    
    private function plus($counter)
    {
        $this->answer += $this->list_Of_Numbers[$counter];
    }
    
    private function minus($counter)
    {
        $this->answer -= $this->list_Of_Numbers[$counter];
    }
    
    private function multiply($counter)
    {
        $this->answer *= $this->list_Of_Numbers[$counter];
    }
    
    private function divide($counter)
    {
        if(is_numeric($this->list_Of_Numbers[$counter]) && !(0 == $this->list_Of_Numbers[$counter]))
        {
            $this->answer /= $this->list_Of_Numbers[$counter];
        }
        else
        {
            throw new Exception('dividition on null');
        }
    }
}