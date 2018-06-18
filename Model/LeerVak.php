<?php


/**
 * Class LeerVak
 *
 * Create model for Leervak
 */
class LeerVak
{


    private $Course;

    private $ID;

    /**
     * @param string $name
     *
     * Set property name
     * @pre recieve a string for the name
     *
     */
    public function SetCourse(string $name)
    {
        $this->Course = $name;
    }

    /**
     * @param int $id
     *
     * Set property id
     * @pre recieve a int for the id
     */
    public function SetID(int $id)
    {
        $this->ID = $id ;
    }

    /**
     * @return string
     *
     * Return the coursename
     *
     */
    public function GetCourse(): string
    {
        return $this->Course;
    }

    /**
     * @return int
     *
     * return de course ID
     */
    public function GetID(): int
    {
        return $this->ID;
    }

}