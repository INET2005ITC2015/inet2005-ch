<?php

require_once 'iActorDataModel.php';

class MySQLiActorDataModel implements iActorDataModel
{
    private $dbConnection;
    private $result;

    // iActorDataAccess methods
    public function connectToDB()
    {
        $this->dbConnection = @new mysqli("localhost", "root", "inet2005", "sakila");
        if (!$this->dbConnection) {
            die('Could not connect to the Sakila Database: ' .
                $this->dbConnection->connect_errno);
        }
    }

    public function closeDB()
    {
        $this->dbConnection->close();
    }

    public function selectActors()
    {
        $selectStatement = "SELECT * FROM actor";
        $selectStatement .= " LIMIT 0,10;";
        $this->result = @$this->dbConnection->query($selectStatement);
        if (!$this->result) {
            die('Could not retrieve records from the Sakila Database: ' .
                $this->dbConnection->error);
        }

    }

    public function selectActorById($actorID)
    {
        $selectStatement = "SELECT * FROM actor";
        $selectStatement .= " WHERE actor.actor_id = $actorID;";
        $this->result = @$this->dbConnection->query($selectStatement);
        if (!$this->result) {
            die('Could not retrieve records from the Sakila Database: ' .
                $this->dbConnection->error);
        }
    }

    public function fetchActors()
    {
        if (!$this->result) {
            die('No records in the result set: ' .
                $this->dbConnection->error);
        }
        return $this->result->fetch_array();
    }

    public function updateActor($actorID, $first_name, $last_name)
    {
        $updateStatement = "UPDATE actor";
        $updateStatement .= " SET first_name = '{$first_name}',last_name='{$last_name}'";
        $updateStatement .= " WHERE actor_id = {$actorID};";
        $this->result = @$this->dbConnection->query($updateStatement);
        if (!$this->result) {
            die('Could not update records in the Sakila Database: ' .
                $this->dbConnection->error);
        }

        return $this->dbConnection->affected_rows;
    }

    public function fetchActorID($row)
    {
        return $row['actor_id'];
    }

    public function fetchActorFirstName($row)
    {
        return $row['first_name'];
    }

    public function fetchActorLastName($row)
    {
        return $row['last_name'];
    }

    public function deleteActor($actorID)
    {
        // TODO: Implement deleteActor() method.
        $updateStatement = "DELETE FROM actor WHERE ";
        $updateStatement .= " actor_id='{$actorID}';";
        $this->result = @$this->dbConnection->query($updateStatement);
        if (!$this->result) {
            die('Could not update records in the Sakila Database: ' .
                $this->dbConnection->error);
        }

        return $this->dbConnection->affected_rows;
    }

    public function insertActor($actorID, $first_name, $last_name)
    {
        // TODO: Implement insertActor() method.
        $updateStatement = "UPDATE actor";
        $updateStatement .= " SET first_name = '{$first_name}',last_name='{$last_name}'";
        $updateStatement .= " WHERE actor_id = {$actorID};";
        $this->result = @$this->dbConnection->query($updateStatement);
        if (!$this->result) {
            die('Could not update records in the Sakila Database: ' .
                $this->dbConnection->error);
        }

        return $this->dbConnection->affected_rows;
    }
}
