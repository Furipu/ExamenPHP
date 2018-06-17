<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 05/06/2018
 * Time: 22:03
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