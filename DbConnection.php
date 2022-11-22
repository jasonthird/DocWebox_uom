<?php

class DbConnection
{
    private
        $userDb,
        $passwordDb,
        $hostDb,
        $portDb,
        $databaseName,
        $connection;

    //read from file config.php and set the variables
    public function __construct()
    {
        require_once("config.php");
        if (!empty($user)) {
            $this->userDb = $user;
        }
        if (!empty($password)) {
            $this->passwordDb = $password;
        }
        if (!empty($host)) {
            $this->hostDb = $host;
        }
        if (!empty($port)) {
            $this->portDb = $port;
        }
        if (!empty($database)) {
            $this->databaseName = $database;
        }

    }

    public function connect()
    {
        $this->connection = new mysqli($this->hostDb, $this->userDb, $this->passwordDb, $this->databaseName, $this->portDb);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        return $this->connection;
    }

    public function close()
    {
        $this->connection->close();
    }

}
