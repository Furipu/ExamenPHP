<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 03/06/2018
 * Time: 00:32
 */
//include "Student.php";
//include "LeerVak.php";

/**
 * Class Resultaat
 */
class Resultaat
{
    /**
     * @var
     */
    private $Grade;
    /**
     * @var
     */
    private $ID;
    /**
     * @var
     */
    private $Student;
    /**
     * @var
     */
    private $LeerVak;


    /**
     * @param int $grade
     */
    public function SetGrade(int $grade)
    {
        $this->Grade = $grade;
    }

    /**
     * @param int $id
     */
    public function SetID(int $id)
    {
        $this->ID = $id ;
    }

    /**
     * @param Student $student
     */
    public function SetStudent(Student $student)
    {
        $this->Student = $student ;
    }

    /**
     * @param LeerVak $leerVak
     */
    public function SetLeerVak(LeerVak $leerVak)
    {
        $this->LeerVak = $leerVak ;
    }

    /**
     * @return int
     */
    public function GetGrade(): int
    {
        return $this->Grade;
    }

    /**
     * @return int
     */
    public function GetID(): int
    {
        return $this->ID;
    }

    /**
     * @return Student
     */
    public function GetStudent(): Student
    {
        return $this->Student;
    }

    /**
     * @return LeerVak
     */
    public function GetLeerVak(): LeerVak
    {
        return $this->LeerVak;
    }

}