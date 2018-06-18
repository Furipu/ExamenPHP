<?php


/**
 * Class Resultaat
 *
 * Create model for Resultaat
 */
class Resultaat
{
    private $Grade;
    private $ID;
    private $Student;
    private $LeerVak;


    /**
     * @param int $grade
     *
     * set the grade of resultaat
     * @pre int as grade
     */
    public function SetGrade(int $grade)
    {
        $this->Grade = $grade;
    }

    /**
     * set id of resultaat
     *
     * @param int $id
     * @pre int as id
     */
    public function SetID(int $id)
    {
        $this->ID = $id ;
    }

    /**
     * set student object as student
     *
     * @param Student $student
     * @pre an object student
     */
    public function SetStudent(Student $student)
    {
        $this->Student = $student ;
    }

    /**
     * set leervak object as leervak
     *
     * @param LeerVak $leerVak
     * @pre an object leervak
     */
    public function SetLeerVak(LeerVak $leerVak)
    {
        $this->LeerVak = $leerVak ;
    }

    /**
     * return the grade of leervak
     *
     * @return int
     */
    public function GetGrade(): int
    {
        return $this->Grade;
    }

    /**
     * return the id of leervak
     *
     * @return int
     */
    public function GetID(): int
    {
        return $this->ID;
    }

    /**
     * return the object of student
     *
     * @return Student
     */
    public function GetStudent(): Student
    {
        return $this->Student;
    }

    /**
     * return the object of leervak
     *
     * @return LeerVak
     */
    public function GetLeerVak(): LeerVak
    {
        return $this->LeerVak;
    }

}