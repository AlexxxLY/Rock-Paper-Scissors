<?php
/**
 * Rock-Paper-Scissors
 */
define('SHAPES', ['R', 'P', 'S']);
function getUserShape()
{
    echo '<form action="" method="GET">
	  <input type="text" name="user" value="">
	  <input type="submit">
      </form>';
    $line = $_REQUEST['user'];
    if (empty($line)) {
        return 'empty';
    } elseif ($line == 'R' || $line == 'P' || $line == 'S') {
        return $line;
    } else {
        return 'invalid_input';
    }
}
function getCompShape()
{
    $result = SHAPES[rand(0, 2)];
    return $result;
}
function printShape($shape1, $shape2)
{
    return ("<br>First - $shape1 <br>  Second - $shape2 <br>");
}
function playRockPaperScissors($firstShape, $secondShape)
{
    if ($firstShape == 'empty') {
        return 'ENTER VALUE R P S';
    } elseif ($firstShape == 'invalid_input') {
        return 'INVALID INPUT ... USER LOST!!!';
    } elseif ($firstShape == $secondShape) {
        return 'DROW!!! ' . printShape($firstShape, $secondShape);
    } elseif (($firstShape == 'R' && $secondShape == 'S') ||
              ($firstShape == 'P' && $secondShape == 'R') ||
              ($firstShape == 'S' && $secondShape == 'P')) {
        return 'First player winner!' . printShape($firstShape, $secondShape);
    } else {
        return 'Second player winner!' . printShape($firstShape, $secondShape);
    }
}
echo 'First: user<br>';
echo 'Second: comp';
echo playRockPaperScissors(getUserShape(), getCompShape()) . PHP_EOL;