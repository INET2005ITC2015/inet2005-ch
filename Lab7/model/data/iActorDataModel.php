<?php

interface iActorDataModel
{
    public function connectToDB();

    public function closeDB();

    public function selectActors();

    public function selectActorById($actorID);

    public function fetchActors();

    public function updateActor($actorID, $first_name, $last_name);

    public function fetchActorID($row);

    public function fetchActorFirstName($row);

    public function fetchActorLastName($row);

    public function insertActor($first_name, $last_name);

    public function deleteActor($actorID, $first_name, $last_name);

    public function search($search_string);
}