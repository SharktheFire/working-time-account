<?php

class MySQLRepository {

    private $client;

    public function __construct()
    {
        $host = "127.0.0.1";
        $username = "root";
        $password = "";
        $this->client = new mysqli($host, $username, $password);

        // check for connection
        if ($this->client->connect_error) {
            die("Connection failed: " . $this->client->connect_error);
        }

        // check for existing database
        $database = "CREATE DATABASE IF NOT EXISTS workingTimeAccount";
        if ($this->client->query($database) === false) {
            die("Error creating database: " . $this->client->error);
        }

        $this->client->select_db("workingTimeAccount");
            if (
                $this->client->query("CREATE TABLE IF NOT EXISTS time(
                    id INT NOT NULL AUTO_INCREMENT,
                    startTime CHAR NOT NULL,
                    endTime CHAR NOT NULL,
                    primary key (id)
                    )") === false
            ) {
                die("Table creation failed: (" . $this->client->errno . ") " . $this->client->error);
            }
    }

    // public function __destruct()
    // {
    //     $this->client->close();
    // }

    public function addTime(string $startTime, string $endTime)
    {
        if ($this->client->query("INSERT INTO time (startTime, endTime)
        VALUES ($startTime, $endTime);") === false) {
            die("Add Time into database failed during runtime: (" . $this->client->errno . ") " . $this->client->error);
        }
    }

    public function getAll()
    {
        $query = "SELECT startTime, endTime FROM time;";
        $result = $this->client->query($query);
        $times = [];
        foreach ($result as $row) {
            $times[][$row['startTime']] = $row['endTime'];
        }
        return $times;
    }
}


?>
