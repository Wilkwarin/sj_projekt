<?php

class Database
{
    private $connection = null;

    public function connect()
    {
        if ($this->connection === null) {
            try {
                $this->connection = new PDO(
                    "mysqlhost=" . $GLOBALS["DATABASE"]["HOST"] . ";port=" . $GLOBALS["DATABASE"]["PORT"] . ";dbname=" . $GLOBALS["DATABASE"]["DBNAME"] . ";charset=utf8mb4",
                    $GLOBALS["DATABASE"]["USER"],
                    $GLOBALS["DATABASE"]["PASSWORD"]
                );
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                return true;
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }
    }
}
