<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 07/06/2018
 * Time: 21:29
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
        $sql = "SELECT LeerVakID, Vak FROM leervak";
        $data =  $conn->query($sql)->fetchAll();
        return $data;
    }

    /**
     * Create a new leervak in the database
     *
     * @param Leervak $leervak
     * @return int
     */
    public function CreateLeervak(Leervak $leervak) :int{
        $conn = $this->GetConnection();
        $sql = "INSERT INTO leervak (Vak) values (?)";
        $conn->prepare($sql)->execute([$leervak->GetCourse()]);
        return $conn->lastInsertId();
    }
}