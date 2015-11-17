<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Insert Actor</title>
</head>
<body>
<h1>Insert Actor:</h1>

<form id="formDelete" name="formDelete" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>
        <label>Type 'DELETE' to delete:
            <input type="text" name="delete" id="delete"/>
        </label>
    </p>

    <input type="hidden" name="idToDelete" id="idToDelete" value="<?= $currentActor->getID() ?>">

    <p>
        <input type="submit" name="delBtn" id="delBtn" value="Delete Actor"/>
    </p>
</form>
</body>
</html>
