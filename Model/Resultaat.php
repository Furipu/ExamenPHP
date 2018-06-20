<?php


/**
 * Class Resultaat
 *
 * Create model for Resultaat
 *
 * @property string $_grade -> grade of a leervak of a student
 * @property int $_id -> id of the Resultaat
 * @property Student $_student -> object of a student
 * @property Leervak $_leervak -> object of a leervak
 */
class Resultaat
{
    private $_grade;
    private $_id;
    private $_student;
    private $_leerVak;


    /**
     * @param int $grade
     *
     * set the grade of resultaat
     * @pre int as grade
     */
    public function SetGrade(int $grade)
    {
        $this->_grade = $grade;
    }

    /**
     * set id of resultaat
     *
     * @param int $id
     * @pre int as id
     */
    public function SetId(int $id)
    {
        $this->_id = $id ;
    }

    /**
     * set student object as student
     *
     * @param Student $student
     * @pre an object student
     */
    public function SetStudent(Student $student)
    {
        $this->_student = $student ;
    }

    /**
     * set leervak object as leervak
     *
     * @param LeerVak $leerVak
     * @pre an object leervak
     */
    public function SetLeerVak(LeerVak $leerVak)
    {
        $this->_leerVak = $leerVak ;
    }

    /**
     * return the grade of leervak
     *
     * @return int
     */
    public function GetGrade(): int
    {
        return $this->_grade;
    }

    /**
     * return the id of leervak
     *
     * @return int
     */
    public function GetId(): int
    {
        return $this->_id;
    }

    /**
     * return the object of student
     *
     * @return Student
     */
    public function GetStudent(): Student
    {
        return $this->_student;
    }

    /**
     * return the object of leervak
     *
     * @return LeerVak
     */
    public function GetLeerVak(): LeerVak
    {
        return $this->_leerVak;
    }

}