<html>
    <body>
        <?php
        /**
         * Created by PhpStorm.
         * User: inet2005
         * Date: 9/15/15
         * Time: 11:59 PM
         */

        //Step 1
        echo "<h1>Greetings from lab 1</h1>";
        ?>

        <p>End first PHP block.</p>

        <?php
        echo "<h3>Echo this H3 tag</h3>";
        ?>

        <p>End step 1</p>

        <?php
        //Step 2
        $myName = "Christian";
        echo "<h3>My name is $myName</h3>"
        ?>

        <p>End step 2</p>

        <?php
        //Step 3
        $concat = "This" . " is a " . "concatenated string!";
        echo "<h3>$concat</h3>"
        ?>

        <p>End step 3</p>

        <?php
        //Step 4
        $a = 32;
        $b = 14;
        $c = 83;
        $result = ($a * $b) + $c;
        echo "<h3>($a * $b) + $c = $result</h3>";
        $a = 1024;
        $b = 128;
        $c = 7;
        $result = ($a / $b) - $c;
        echo "<h3>($a / $b) - $c = $result</h3>";
        $a = 769;
        $b = 6;
        $result = $a % $b;
        echo "<h3>$a divided by $b gives a remainder of $result</h3>";
        ?>

        <p>End step 4</p>

        <?php
        //Step 5
        $message = "";
        for ($i = 10; $i > 0; $i--)
        {
            $message .= $i . "...";
        }
        $message .= "Blast Off";
        echo "<h3>$message</h3>";
        ?>

        <p>End step 5</p>

        <?php
        //Step 6
        $colors = array("Blue", "Red", "Yellow", "Green", "Black", "White", "Grey", "Orange");
        $message = "";
        for ($i = 0; $i < count($colors); $i++)
        {
            $message .= $colors[$i] . ", ";
        }
        $message = substr($message, 0, -2);
        echo "<h3>$message</h3>";

        $message = "";
        foreach ($colors as $color)
        {
            $message .= $color . ", ";
        }
        $message = substr($message, 0, -2);
        echo "<h3>$message</h3>";

        $message = "";
        $i = 0;
        while ($i < 8)
        {
            $message .= $colors[$i] . ", ";
            $i++;
        }
        $message = substr($message, 0, -2);
        echo "<h3>$message</h3>";
        ?>

        <p>End Step 6</p>
    </body>
</html>