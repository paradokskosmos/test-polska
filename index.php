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
 
$expression = $_GET['track'];
if(isset($expression))
{
    $calculator = new AdditionalCalculator();

    try
    {

        echo "answer is " . $calculator->getAnswer($expression);
      
      
    } catch (Exception $exp)
    {
        echo "please enter right string, for example '15 16 *'";
    }
}