<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 08/06/2018
 * Time: 14:57
 */
include ("../Model/LeerVak.php");
include ("../Repositories/StudentRepository.php");
include ("../Repositories/LeervakRepository.php");
include ("../Repositories/ResultaatRepository.php");
/**
 * Class LeervakService
 */
class LeervakService
{
    /**
     * Check if leervak exist, if not then send the leervak to the repository to be created
     *
     * @param array $leervak
     */
    public function CreateLeervak(array $leervak){
        $leervakRepo = new LeervakRepository();
        $activeLeervakken = $leervakRepo->GetLeervakken();
        if ($this->CheckIfValueExist(reset($leervak),$activeLeervakken)){
            echo "Dit vak bestaat reeds";
        }else{
            $newLeervak = new LeerVak();
            $newLeervak->SetCourse(reset($leervak));
            $leervakId = $leervakRepo->CreateLeervak($newLeervak);
            $studenten = $this->GetActiveStudenten();
            $this->CreateResultaat($leervakId, $studenten);
            header('Location:index.php');
        }

    }

    /**
     * Ask the repository to get all students from the database
     *
     * @return array
     */
    public function GetActiveStudenten() :array{
        $repo = new StudentRepository();
        return $repo->GetStudentsId();
    }

    /**
     * Ask the repository to create a resultaat in the database
     *
     * @param int $leervakId
     * @param array $studenten
     */
    public function CreateResultaat(int $leervakId, array $studenten){
        $repo = new ResultaatRepository();
        $repo->CreateResultWithNewLeervak($leervakId, $studenten);
    }

    /**
     * Check if the string is part of the array value
     *
     * @param string $newLeervak
     * @param array $activeLeervakken
     * @return bool return true if string is part of array
     */
    public function CheckIfValueExist(string $newLeervak, array $activeLeervakken){
        $exist = false;
        foreach ($activeLeervakken as $value){
            if (in_array($newLeervak,$value)){
                $exist = true;
            }
        }
        return $exist;
    }
}