<?php


/**
 * Class LeerVak
 *
 * Create model for Leervak
 * @property string $_course -> name of the course
 * @property  int $_id = id of the course
 */
class LeerVak
{


    private $_course;
    private $_id;

    /**
     * @param string $name
     *
     * Set property name
     * @pre recieve a string for the name
     *
     */
    public function SetCourse(string $name)
    {
        $this->_course = $name;
    }

    /**
     * @param int $id
     *
     * Set property id
     * @pre recieve a int for the id
     */
    public function SetId(int $id)
    {
        $this->_id = $id ;
    }

    /**
     * @return string
     *
     * Return the coursename
     *
     */
    public function GetCourse(): string
    {
        return $this->_course;
    }

    /**
     * @return int
     *
     * return de course ID
     */
    public function GetId(): int
    {
        return $this->_id;
    }

}