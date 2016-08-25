<p>
<form action="">
<p>input the expression</p>
<input type="text" required="" name="track">
<input type="submit" value="Submit">
</form>
</p>

<?php
 
 include 'Calculator.php';
 include 'AdditionalCalculator.php';
 
$expression = &$_GET['track'];
//var_dump($expression);
if(isset($expression))
{
    $calculator = new AdditionalCalculator();

//    $calculator->testFunc($expression);
    try
    {

      $calculator->getStr($expression);
      echo "answer is " . $calculator->getAnswer();
      
      
    } catch (Exception $exp)
    {
        echo "please enter right string, for example '15 16 *'";
    }
}

//$string = new SplString("Testing");
//
//var_dump($string);