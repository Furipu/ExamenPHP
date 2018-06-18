<?php


/**
 * Class BaseRepository
 *
 * BaseRepository with connection to database
 */
abstract class BaseRepository
{
    /**
     * make the connection with the database. This is in defence coding
     * @return PDO
     */
    public function GetConnection()
    {
        try {
            $conn = new PDO("mysql:dbname=examenphp", "root", NULL);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error connecting to SQL Server");
        }
        return $conn;
    }
}