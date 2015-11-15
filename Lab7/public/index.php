<?php

require_once '../controller/ActorController.php';

$actorController = new ActorController();

if (isset($_GET['idUpdate'])) {
    $actorController->updateAction($_GET['idUpdate']);
} elseif (isset($_POST['UpdateBtn'])) {
    $actorController->commitUpdateAction($_POST['editActorId'], $_POST['firstName'], $_POST['lastName']);
} else {
    $actorController->displayAction();
}