<?php

require_once 'iActorDataModel.php';

class PDOMySQLActorDataModel implements iActorDataModel
{
    private $dbConnection;
    private $result;
    private $stmt;

    // iActorDataAccess methods
    public function connectToDB()
    {
        try {
            $this->dbConnection = new PDO("mysql:host=localhost;dbname=sakila", "root", "inet2005");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die('Could not connect to the Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }

    public function selectActors()
    {
        // hard-coding for first ten rows
        $start = 190;
        $count = 25;

        $selectStatement = "SELECT * FROM actor";
        $selectStatement .= " LIMIT :start,:count;";

        try {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $this->stmt->bindParam(':count', $count, PDO::PARAM_INT);

            $this->stmt->execute();
        } catch (PDOException $ex) {
            die('Could not select records from Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function selectActorById($actorID)
    {
        $selectStatement = "SELECT * FROM actor";
        $selectStatement .= " WHERE actor.actor_id = {$actorID};";

        try {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':actorID', $actorID, PDO::PARAM_INT);

            $this->stmt->execute();
        } catch (PDOException $ex) {
            die('Could not select records from Sakila Database via PDO: ' . $ex->getMessage());
        }
    }


    public function fetchActors()
    {
        try {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        } catch (PDOException $ex) {
            die('Could not retrieve from Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function updateActor($actorID, $first_name, $last_name)
    {
        $updateStatement = "UPDATE actor";
        $updateStatement .= " SET first_name = :firstName,last_name=:lastName";
        $updateStatement .= " WHERE actor_id = :actorID;";

        try {
            $this->stmt = $this->dbConnection->prepare($updateStatement);
            $this->stmt->bindParam(':firstName', $first_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $last_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':actorID', $actorID, PDO::PARAM_INT);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        } catch (PDOException $ex) {
            die('Could not select records from Sakila Database via PDO: ' . $ex->getMessage());
        }
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

    /**
     * @param $actorID
     * @return mixed
     */

    public function insertActor($first_name, $last_name)
    {
        $insertStatement = "INSERT INTO actor (first_name, last_name)";
        $insertStatement .= " VALUES ('{$first_name}', '{$last_name}')";

        try {
            $this->stmt = $this->dbConnection->prepare($insertStatement);
            $this->stmt->bindParam(':firstName', $first_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $last_name, PDO::PARAM_STR);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        } catch (PDOException $ex) {
            die('Could not insert record into Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function deleteActor($actorID, $first_name, $last_name)
    {
        $deleteStatement = "DELETE FROM actor WHERE";
        $deleteStatement .= " actor_id='{$actorID}' AND";
        $deleteStatement .= " first_name='{$first_name}' AND";
        $deleteStatement .= " last_name='{$last_name}';";

        try {
            $this->stmt = $this->dbConnection->prepare($deleteStatement);
            $this->stmt->bindParam(':firstName', $first_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $last_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':actorID', $actorID, PDO::PARAM_INT);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        } catch (PDOException $ex) {
            die('Could not insert record into Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function search($search_string)
    {
        $sqlStatement = "SELECT * FROM actor WHERE ";
        $sqlStatement .= "first_name LIKE '{$search_string}%' ";
        $sqlStatement .= "OR last_name LIKE '{$search_string}%';";
        try {
            $this->stmt = $this->dbConnection->prepare($sqlStatement);
            $this->stmt->bindParam(':searchString', $search_string, PDO::PARAM_STR);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        } catch (PDOException $ex) {
            die('Could not find records in the Sakila Database via PDO: ' . $ex->getMessage());
        }
    }
}