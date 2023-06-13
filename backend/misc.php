<?php

interface NoteSaver
{
    public function saveNote($title, $body); // would I need to have all of the items here? Like ID, pinned, etc?
}

class DatabaseNoteSaver implements NoteSaver
{
    private $dbConnection;

    public function __construct($dbHost, $dbUser, $dbPassword, $dbName)
    {
        $this->dbConnection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName); // new MySQLi connection to the db

        if ($this->dbConnection->connect_error) {
            die("connection failed" . $this->dbConnection->connect_error); //I'd need an actual DD function here?
        }
    }

    public function saveNote($title, $body)
    { //again, pinned etc??
        $title = $this->dbConnection->escape_string($title);
        $body = $this->dbConnection->escape_string($body);

        $query = "INSERT INTO `organiseme`.`notes` (`title`, `body`) VALUES (`my first note`, `hello`)";
        if ($this->dbConnection->query($query) === TRUE) {
            echo "ta da! Note saved!";
        } else {
            echo "uhoh, you didn't say the magic word" . $this->dbConnection->error;
        }
    }
}
