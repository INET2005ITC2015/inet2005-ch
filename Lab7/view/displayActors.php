<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Actors</title>
        <style type="text/css">
            table
            {
               border: 1px solid purple;
            }
            th, td
            {
               border: 1px solid red;
            }
        </style>
    </head>
    <body>
        <?php
            if(!empty($lastOperationResults)):
        ?>
        <h2><?php echo $lastOperationResults; ?></h2>
        <?php
            endif;
        ?>
        <h1>Current Actors:</h1>
        <table>
            <thead>
                <tr>
                    <th>Actor ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($arrayOfActors as $Actor):
                        
                    ?>
                        <tr>
                            <td><?php echo $Actor->getID(); ?></td>
                            <td><?php echo $Actor->getFirstName(); ?></td>
                            <td><?php echo $Actor->getLastName(); ?></td>
                            <td>
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idUpdate=<?php echo $Actor->getID(); ?>">
                                    <img src="../public/images/edit_icon.png" height="25px" width="25px"/>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                ?>
            </tbody>
            <tfoot></tfoot>
        </table>  
    </body>
</html>
