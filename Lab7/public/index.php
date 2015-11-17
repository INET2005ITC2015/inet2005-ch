<?php

require_once '../controller/ActorController.php';

$actorController = new ActorController();

if (isset($_GET['idUpdate'])) {
    $actorController->updateAction($_GET['idUpdate']);
} elseif (isset($_POST['UpdateBtn'])) {
    $actorController->commitUpdateAction($_POST['editActorId'], $_POST['firstName'], $_POST['lastName']);
} elseif (isset($_GET['insert'])) {
    $actorController->insertAction();
} elseif (isset($_POST['insertBtn'])) {
    $actorController->commitInsertAction($_POST['firstName'], $_POST['lastName']);
} elseif (isset($_GET['idDelete'])) {
    $actorController->deleteAction($_GET['idDelete']);
} elseif (isset($_POST['delBtn'])) {
    if ($_POST['delete'] == "DELETE") {
        $actorController->commitDelete($_POST['idToDelete']);
    }
} else {
    $actorController->displayAction();
}