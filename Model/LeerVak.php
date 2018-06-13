<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 03/06/2018
 * Time: 00:32
 */

class LeerVak
{

    /**
     * @var
     */
    private $Course;
    /**
     * @var
     */
    private $ID;

    /**
     * @param string $name
     */
    public function SetCourse(string $name)
    {
        $this->Course = $name;
    }

    /**
     * @param int $id
     */
    public function SetID(int $id)
    {
        $this->ID = $id ;
    }

    /**
     * @return string
     */
    public function GetCourse(): string
    {
        return $this->Course;
    }

    /**
     * @return int
     */
    public function GetID(): int
    {
        return $this->ID;
    }

}