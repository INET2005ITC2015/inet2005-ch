<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 9/15/15
 * Time: 2:42 PM
 */

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['target']) && isset($_POST['guess']))
{
    $numberTarget = $_POST['target'];
    $numberGuessed = $_POST['guess'];

    if ($numberGuessed < $numberTarget)
    {
        $message = "Guess Higher";
    } elseif ($numberGuessed > $numberTarget)
    {
        $message = "Guess Lower";
    } elseif ($numberGuessed == $numberTarget)
    {
        $message = "You got it!";
    }
}
else
{
    $message = "Welcome to my guessing game!";
    $numberTarget = rand(1,100);
}
?>
<html>
<head>
    <title>A PHP number guessing script</title>
</head>
<body>
<h1>
    <?php print $message ?>
</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post" name="guessinggame">
    <p>Number:
        <input name="guess" type="text">
    </p>
    <p>
        <input type="hidden" name="target" value="<?php echo $numberTarget ?>">
    </p>
    <p>
        <input name="" type="submit">
    </p>
</form>
</body>
</html>
