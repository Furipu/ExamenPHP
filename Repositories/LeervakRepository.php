<?php

/**
 * Class LeervakRepository
 *
 * Connection to database for Leervak
 */
class LeervakRepository extends BaseRepository
{
    /**
     * Get all the leervakken from the database
     *
     * @return array
     */
    public function GetLeervakken() :array {
        $conn = $this->GetConnection();
        $sql = "SELECT LeerVakID, Naam FROM leervak";
        $data =  $conn->query($sql)->fetchAll();
        return $data;
    }

    /**
     * Create a new leervak in the database
     *
     * @param Leervak $leervak
     * @return int
     * @pre get an object leervak
     * @post return an int of last inserted id
     */
    public function CreateLeervak(Leervak $leervak) :int{
        $conn = $this->GetConnection();
        $sql = "INSERT INTO leervak (Naam) values (?)";
        $data = $leervak->GetCourse();
        $conn->prepare($sql)->execute([$data]);
        return $conn->lastInsertId();
    }
}