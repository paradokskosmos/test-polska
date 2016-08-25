<?php
 
 
/**
 * Определение MyClass
 */
class MyClass
{
    public $public = 'Общий';
    protected $protected = 'Защищенный';
    private $private = 'Закрытый';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

 

/**
 * Определение MyClass2
 */
class MyClass2 extends MyClass
{
    // Мы можем переопределить public и protected методы, но не private
  protected $protected = 'Защищенный2';

    function printHello()
    {
        //echo $this->public;
        //echo $this->protected;
        echo $this->private;
    }
}
//
// $obj2 = new MyClass2();
////echo $obj2->public; // Работает
////echo $obj2->protected; // Неисправимая ошибка
////echo $obj2->private; // Неопределен
// $obj2->printHello(); // Выводит Общий, Защищенный2 и Неопределен

?>
