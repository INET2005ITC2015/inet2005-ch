<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title></title>
    <style>
        table, th, td{
            width: 12em;
            text-align: left;
            border: 1px solid black;
        }
        table tr:nth-child(odd) {
            background-color: lightslategrey;
        }
        table th {
            background-color: grey;
        }
    </style>
</head>
<body>
    <table>
       <tr>
           <th>Fahrenheit</th>
           <th>Celsius</th>
       </tr>
        <?php
        for($i=0; $i<101; $i++) {
            $celsius = round(($i - 32) * (5/9), 0);
            echo "<tr><td>$i</td><td>$celsius</td></tr>";
        }
        ?>
    </table>
</body>
</html>