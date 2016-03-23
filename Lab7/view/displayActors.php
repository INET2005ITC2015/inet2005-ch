<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Actors</title>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <script src="../js/AJAX.js"></script>
</head>
<body>
<div class="container">
    <?php
    if (!empty($lastOperationResults)):
        ?>
        <h2><?php echo $lastOperationResults; ?></h2>
    <?php
    endif;
    ?>
    <h1>Current Actors:</h1><br>
    <a class="btn btn-default" href="<?= $_SERVER['PHP_SELF']; ?>?insert=true">Insert New Actor</a><br><br>
    <label for="search">Search: </label>
    <input id="search" type="text" value="<?= $_GET['search'] ?>">
    <table class="table">
        <thead>
        <tr>
            <th>Actor ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrayOfActors as $Actor):
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
                <td>
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idDelete=<?php echo $Actor->getID(); ?>">
                        <img src="../public/images/delete_icon.png" height="25px" width="25px"/>
                    </a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
        <tfoot></tfoot>
    </table>
</div>
</body>
</html>
